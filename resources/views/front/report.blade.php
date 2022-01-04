@extends('layouts.master')
@section('content')

    <!-- Help Center -->
    <div class="g-bg-img-hero" style="background-image: url(themes/default/include/svg/svg-bg1.svg);">
        <div class="container g-pt-100 g-pb-150">
            <div class="g-max-width-645 mx-auto">
                <!-- Heading -->
                <div class="g-max-width-645 text-center mx-auto g-mb-40">
                    <h1 class="g-font-size-40--md mb-3">Laporan apa yang anda cari?</h1>
                    <p>Telusuri pusat bantuan kami untuk mendapatkanya</p>
                </div>
                <!-- End Heading -->

                <!-- Help Form -->
                <form class="input-group">
                    <input class="form-control u-shadow-v35 g-brd-secondary-light-v2 g-rounded-left-30 g-px-30 g-py-12"
                        type="text" placeholder="Start typing" name="search">
                    <div class="input-group-btn">
                        <button type="submit"
                            class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-right-30 g-px-25 g-py-10">Search
                            <i class="ml-3 fa fa-search"></i></button>
                    </div>
                </form>
                <!-- End Help Form -->
            </div>
        </div>
    </div>
    <!-- End Help Center -->


    <section class=" g-pb-90">
        <div class="container">

            @foreach ( $reports as $r )
            <div
                class="u-block-hover u-shadow-v35 u-shadow-v37--hover g-brd-around g-brd-secondary-light-v2 rounded g-pos-rel g-pa-30 g-mb-30">
                <div class="row align-items-center">
                    <div class="col-md-2 pl-0 g-pr-0--md text-center">
                        {{-- <span class="u-icon-v1 u-icon-size--3xl d-flex mx-auto">
                            <i class="icon-finance-051 u-line-icon-pro"></i>
                        </span> --}}
                        <img class="img-fluid" src="{{ asset('themes/default/img/svg/report.svg') }}">
                    </div>
                    <div class="col-md-10 g-pl-0--md">
                        <h2 class="g-color-primary--hover h4">{{ $r->name }}</h2>
                        <div class="g-color-text-light-v1">
                            {!! $r->description !!}
                        </div>
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-10 offset-2 pl-0">
                        <div class="d-flex justify-content-between">
                            <ul class="u-list-inline">
                                @foreach ($r->getThumbs200ForCollection('report') as $media )
                                    @if ($media['type'] == 'image/jpeg' || $media['type'] == 'image/jpeg')
                                        <li class="list-inline-item mr-1">
                                            <img class="g-brd-around g-brd-gray-light-v3 g-pa-2 g-width-80 g-height-80 g-rounded-3" src="{{ $media['thumb_url'] }}" alt="{{ $media['name']}}">
                                        </li>
                                    @else
                                        <li class="list-inline-item mr-1">
                                            <img class="g-brd-around g-brd-gray-light-v3 g-pa-2 g-width-80 g-height-80 g-rounded-3 g-color-gray-dark-v1"
                                            src="{{ asset('themes/default/img/svg/'. Helper::appIcon($media['type'])) }}" alt="{{ $media['name']}}">
                                        </li>
                                    @endif
                                @endforeach

                              {{-- <li class="list-inline-item mr-1">
                                <a class="u-link-v4 d-inline-block g-bg-green g-color-white g-font-weight-600 g-text-underline--none--hover g-rounded-3 g-py-8 g-px-11" href="#">5+</a>
                              </li> --}}
                            </ul>
                            <div class="align-self-center">
                              <a class="btn u-btn-outline-primary g-brd-2 g-font-weight-600 g-rounded-3" href="{{ route('front/download-report', $r->id) }}">Download</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


            <hr class="g-brd-gray-light-v4 g-my-40">

            {{ $reports->withQueryString()->links() }}
        </div>
    </section>

@stop
