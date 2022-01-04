@extends('layouts.master')
@section('content')
    <div class="container g-brd-y g-brd-secondary-light-v2 g-pt-50 g-pb-60">
        <div class="row">
            <div class="col-lg-12 g-mb-30" id="app">
                <div>
                    <notifications position="bottom right" :duration="2000" />
                </div>
                <survey-show :survey-data="{{ $survey->toJson() }}"></survey-show>
            </div>
        </div>
    </div>
@stop
