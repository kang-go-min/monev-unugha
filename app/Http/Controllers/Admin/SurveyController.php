<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Survey\BulkDestroySurvey;
use App\Http\Requests\Admin\Survey\DestroySurvey;
use App\Http\Requests\Admin\Survey\IndexSurvey;
use App\Http\Requests\Admin\Survey\StoreAnswer;
use App\Http\Requests\Admin\Survey\StoreSurvey;
use App\Http\Requests\Admin\Survey\UpdateSurvey;
use App\Models\Answer;
use App\Models\Survey;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class SurveyController extends Controller
{
    protected $guard = 'web';

    /**
     * Display a listing of the resource.
     *
     * @param IndexSurvey $request
     * @return array|Factory|View
     */
    public function index(IndexSurvey $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Survey::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'user_id', 'description', 'start_date', 'end_date'],

            // set columns to searchIn
            ['id', 'title', 'description'],

            function ($query) {
                return $query->with('roles');
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.survey.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.survey.create');

        return view('admin.survey.create', [
            'roles' => Role::where('guard_name', $this->guard)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSurvey $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSurvey $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Survey
        $survey = Survey::create($sanitized);

        // But we do have a roles, so we need to attach the roles to the adminUser
        $survey->roles()->sync(collect($request->input('roles', []))->map->id->toArray());

        if ($request->ajax()) {
            return ['redirect' => url('admin/surveys'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/surveys');
    }

    /**
     * Display the specified resource.
     *
     * @param Survey $survey
     * @return void
     * @throws AuthorizationException
     */
    public function show(Survey $survey)
    {
        $this->authorize('admin.survey.show', $survey);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Survey $survey
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Survey $survey)
    {
        $this->authorize('admin.survey.edit', $survey);

        $survey->load('roles');

        unset($survey->json);

        return view('admin.survey.edit', [
            'survey' => $survey,
            'roles' => Role::where('guard_name', $this->guard)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSurvey $request
     * @param Survey $survey
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSurvey $request, Survey $survey)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Survey
        $survey->update($sanitized);

        // But we do have a roles, so we need to attach the roles to the adminUser
        if ($request->input('roles')) {
            $survey->roles()->sync(collect($request->input('roles', []))->map->id->toArray());
        }

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/surveys'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/surveys');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySurvey $request
     * @param Survey $survey
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroySurvey $request, Survey $survey)
    {
        $survey->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySurvey $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroySurvey $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('surveys')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    public function questions(Survey $survey)
    {
        $this->authorize('admin.survey.edit', $survey);

        return view('admin.survey.creator', compact('survey'));
    }

    public function results(Survey $survey)
    {
        $this->authorize('admin.survey.edit', $survey);

        return view('admin.survey.results', compact('survey'));
    }

    public function storeAnswer(StoreAnswer $request, Survey $survey)
    {
        // Sanitize input
        $sanitized = $request->getSanitized($survey->id);

        // Store the Answer
        DB::transaction(function () use ($sanitized) {
            foreach (collect($sanitized)->except('responden') as $data) {
                $answer = Answer::create($data);
            }
        });

        if ($request->ajax()) {
            return ['redirect' => url('admin/surveys'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/surveys');

    }
}
