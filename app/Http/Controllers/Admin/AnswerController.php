<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Answer\BulkDestroyAnswer;
use App\Http\Requests\Admin\Answer\DestroyAnswer;
use App\Http\Requests\Admin\Answer\IndexAnswer;
use App\Http\Requests\Admin\Answer\StoreAnswer;
use App\Http\Requests\Admin\Answer\UpdateAnswer;
use App\Models\Answer;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnswerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAnswer $request
     * @return array|Factory|View
     */
    public function index(IndexAnswer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Answer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'survey_id', 'user_id', 'ip_address', 'json'],

            // set columns to searchIn
            ['id', 'ip_address', 'json']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.answer.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param Answer $answer
     * @throws AuthorizationException
     * @return void
     */
    public function show(Answer $answer)
    {
        $this->authorize('admin.answer.show', $answer);

        return view('admin.answer.show', compact('answer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAnswer $request
     * @param Answer $answer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAnswer $request, Answer $answer)
    {
        $answer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAnswer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAnswer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Answer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
