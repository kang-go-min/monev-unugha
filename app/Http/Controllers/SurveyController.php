<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyStoreRequest;
use App\Models\Survey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function index()
    {
        $survey = Survey::whereHas('roles', function ($query) {
            $roles = Auth::user()->getRoleNames();

            if ($roles->isEmpty()) {
                return $query->where('name', 'Mahasiswa');
            }

            return $query->whereIn('name', $roles);
        })
            ->withCount(['answers'=> function($query){
                $query->where('user_id', auth()->id());
            }])
            ->whereDate('start_date', '<=', Carbon::now(config('app.timezone'))->toDateTimeString())
            ->where(function ($query) {
                return $query->whereDate('end_date', '>=', Carbon::now(config('app.timezone'))->toDateTimeString())
                    ->orWhereNull('end_date');
            })
            ->get();

        return view('front.survey', compact('survey'));
    }

    public function show(Survey $survey)
    {
        return view('front.show-survey', compact('survey'));
    }

    public function store(SurveyStoreRequest $request, Survey $survey)
    {
        $sanitized = $request->getSanitized();
        $sanitized['ip_address'] = $request->ip();

        $answer = $survey->answers()->create($sanitized);

        if ($request->ajax()) {
            return response()->json([
                'data' => $answer,
                'redirect' => route('survey/index'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ]);
        }

        return redirect(route('survey/index'));
    }
}
