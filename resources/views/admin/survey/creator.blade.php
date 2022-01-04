@extends('brackets/admin-ui::admin.layout.default')

@section('title', 'Add Questions Survey: ' . $survey->title)

@section('body')
    <div class="container-xl">

        <div class="card">
            <div class="card-header mb-2">
                <i class="fa fa-pencil"></i> Add Questions Survey: {{ $survey->title }}
            </div>
            <survey-creator
                :action="'{{ $survey->resource_url }}'"
                :data="{{ $survey->toJson() }}"
                v-cloak></survey-creator>
        </div>
    </div>
@endsection
@section('bottom-scripts')
    <script>
        $(".svd_commercial_container").hide();
    </script>
@endsection

