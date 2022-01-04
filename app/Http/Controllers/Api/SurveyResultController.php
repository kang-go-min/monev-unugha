<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyResultController extends Controller
{
    public function results(Survey $survey)
    {
        $results = $survey->load('answers')->firstOrFail();

        return response()->json([
            'Data' => $results->answers,
            'ResultCount' => $results->answers->count()
        ]);
    }
}
