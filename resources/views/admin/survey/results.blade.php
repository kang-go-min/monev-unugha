@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'Add Questions Survey: ' . $survey->title)

@section('body')
    <div class="container-xl">

        <div class="card">
            <div class="card-header mb-2">
                <i class="fa fa-pencil"></i> Results Survey: {{ $survey->title }}
            </div>
            <div id="loadingIndicator">
            <span>
                <div id="loading">
                    <strong class="mx-2 my-2">loading...</strong>
                </div>
            </span>
            </div>
            <div id="surveyResult"></div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
    <script>
        var data = @json($survey)
    </script>

    <script src="https://surveyjs.azureedge.net/1.7.19/survey.vue.js"></script>

    <link href="https://surveyjs.azureedge.net/1.7.19/survey.analytics.css" rel="stylesheet"/>

    <script src="https://cdn.rawgit.com/inexorabletash/polyfill/master/typedarray.js"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js"></script>

    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

    <script src="https://unpkg.com/wordcloud@1.1.0/src/wordcloud2.js"></script>

    <!--<script src="https://surveyjs.azureedge.net/1.7.19/survey.core.js"></script>-->

    <script src="https://surveyjs.azureedge.net/1.7.19/survey.analytics.js"></script>
    <script src="{{asset('js/results.js')}}"></script>
@endsection

