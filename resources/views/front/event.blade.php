@extends('layouts.master')
@section('content')
    <div class="container g-pt-50 g-pb-30">
        <h2 class="g-mb-40">Agenda Kegiatan</h2>
        <div class="row">
            @foreach($monthEvents as $me)
                <div class="col-sm-6 col-lg-3 g-mb-30">
                    <!-- Event Block -->
                    <article class="u-block-hover u-shadow-v38">
                        <div class="g-min-height-300 g-bg-img-hero g-bg-cover g-bg-white-gradient-opacity-v1--after g-pos-rel" style="background-image: url({{$me->image_url}});">
                            <div class="g-pos-abs g-bottom-0 g-left-0 g-right-0 g-z-index-1 g-pa-20">
                                <div class="d-flex justify-content-between">
                                    <div class="mt-auto mb-2">
                                        <span class="d-block g-color-white g-line-height-1_4">{{Carbon::parse($me->start_date)->format('d m Y')}}</span>
                                        <span class="d-block g-color-white g-line-height-1_4">{{Carbon::parse($me->end_date)->format('d m Y')}}</span>
                                    </div>
                                    <div class="text-center">
                                        <span class="g-color-white g-line-height-0_7">{{$me->location}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="g-pa-25">
                            <h3 class="g-color-primary--hover g-font-size-18 mb-0">{{$me->title}}</h3>
                        </div>

                        <a class="u-link-v2 g-z-index-2" href="#"></a>
                    </article>
                    <!-- End Event Block -->
                </div>
            @endforeach
        </div>
    </div>

    <div class="container g-brd-y g-brd-secondary-light-v2 g-pt-50 g-pb-60">
        <div class="row">
            @foreach($events as $ev)
                <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero" style="background-image: url({{$ev->image_url}});"></div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0">
                                        <a class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18" href="#">
                                            {{$ev->title}}
                                        </a>
                                    </h3>
                                </div>
                                <div class="media-body col-4">
                                    <span class="g-color-primary g-font-weight-500 g-font-size-30 g-line-height-0_7">{{Carbon::parse($ev->start_date)->format('d')}}</span>
                                    <span class="g-line-height-0_7">{{Carbon::parse($ev->start_date)->format('M')}}</span>

                                    <div class="u-divider u-divider-solid u-divider-center g-brd-gray-light-v3 g-my-10"></div>

                                    <span class="g-color-primary g-font-weight-500 g-font-size-30 g-line-height-0_7">{{Carbon::parse($ev->start_date)->format('d')}}</span>
                                    <span class="g-line-height-0_7">{{Carbon::parse($ev->start_date)->format('M')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>
                @if(!$loop->odd)
                <div class="w-100"></div>
                @endif
            @endforeach
        </div>
    </div>
@stop