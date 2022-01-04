@extends('layouts.master')
@section('content')
    <div class="container g-brd-y g-brd-secondary-light-v2 g-pt-50 g-pb-60">
        <div class="row">
            @foreach($survey as $ev)
                <div class="col-lg-6 g-mb-30">
                    <!-- Event Listing -->
                    <article class="u-shadow-v39">
                        <div class="row">
                            <div class="col-4">
                                <div class="g-min-height-170 g-bg-img-hero"
                                     style="background-image: url({{$ev->image_url}});"></div>
                            </div>

                            <div class="col-8 g-min-height-170">
                                <p class="g-font-size-14 g-mt-5 g-color-primary g-font-weight-600 g-px-10">
                                    Untuk {{ $ev->roles->implode('name', ', ') }}
                                    @if($ev->answers_count > 0)
                                        <span class="u-label u-label-success g-mr-10 pull-right">Sudah diisi {{$ev->answers_count}} X</span>
                                    @else
                                        <span class="u-label u-label-danger g-mr-10 pull-right">Belum diisi</span>
                                    @endif
                                </p>
                                <div class="media align-items-center g-px-10">
                                    <div class="d-flex col-8 g-pl-0">
                                        <h3 class="g-line-height-1 mb-0">
                                            <a class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                               href="{{route('survey/show', $ev->slug)}}">
                                                {{$ev->title}}
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="media-body col-4">
                                        <p class="g-font-size-12 g-my-0">Mulai</p>
                                        <span
                                            class="g-color-darkblue g-font-weight-500 g-font-size-30 g-line-height-0_7">
                                            {{Carbon::parse($ev->start_date)->format('d')}}
                                        </span>
                                        <span
                                            class="g-line-height-0_7">{{Carbon::parse($ev->start_date)->format('M')}}</span>

                                        <div
                                            class="u-divider u-divider-solid u-divider-center g-brd-gray-light-v3 g-my-3"></div>

                                        <p class="g-font-size-12 g-my-0">Selesai</p>
                                        <span
                                            class="g-color-primary g-font-weight-500 g-font-size-30 g-line-height-0_7">
                                        {{Carbon::parse($ev->end_date)->format('d')}}
                                    </span>
                                        <span
                                            class="g-line-height-0_7">{{Carbon::parse($ev->end_date)->format('M')}}</span>
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
