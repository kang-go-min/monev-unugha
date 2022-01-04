@extends('layouts.master')
@section('content')
    <div class="container g-pt-50">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto g-mb-60">
            <h2 class="h1 mb-3">Image</h2>
            <p>As a truly exceptional place to study in Ontario, we consistently win workplace recognition in our
                industry.</p>
        </div>
        <!-- End Heading -->
        <div class="masonry-grid">
            <div class="masonry-grid-sizer g-width-25x--sm"></div>
            @foreach($instagram as $ig)
                <div class="masonry-grid-item {{$loop->first ? 'g-width-50x--sm' : 'g-width-25x--sm'}}">
                    <a class="js-fancybox" href="javascript:;" data-fancybox="lightbox-gallery--masonry-col4"
                       data-src="{{$ig->displaySrc}}" data-caption="Lightbox Gallery">
                        <img class="img-fluid w-100" src="{{$ig->thumbnailSrc}}" alt="Image Description">
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div id="recognition" class="container g-pt-50 g-pb-70">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto g-mb-60">
            <h2 class="h1 mb-3">Video</h2>
            <p>As a truly exceptional place to study in Ontario, we consistently win workplace recognition in our
                industry.</p>
        </div>
        <!-- End Heading -->

        <div class="row g-mb-60">

            @foreach($videos as $yt)
                <div class="col-sm-6 col-lg-3 g-mb-30">
                    <!-- Research Articles -->
                    <article>
                        <div class="g-pos-rel">
                            <img class="img-fluid mb-3" src="{{$yt->thumbnail_url}}" alt="Image Description">
                            <a class="js-fancybox g-absolute-centered" href="{{$yt->url}}" title="Video">
                      <span class="u-icon-v3 u-block-hover--scale g-color-main g-color-white--hover g-bg-white-opacity-0_5 g-bg-white-opacity-0_3--hover g-font-size-22 rounded-circle">
                        <i class="g-pos-rel g-left-2 fa fa-play"></i>
                      </span>
                            </a>
                        </div>
                        <span class="d-block g-color-secondary-light-v1 g-font-weight-500 g-font-size-12 text-uppercase mb-2">Video</span>
                        <h4 class="h5"><a class="js-fancybox h5 u-link-v5" href="{{$yt->url}}">{{$yt->title}}</a></h4>
                    </article>
                    <!-- End Research Articles -->
                </div>
            @endforeach
        </div>

        <hr class="g-brd-secondary-light-v2 mt-0 g-mb-60">

    </div>
@stop

@push('scripts')
    <!-- JS Implementing Plugins -->
    <script src="{{ url('vendor/masonry/dist/masonry.pkgd.min.js') }}"></script>
    <script src="{{ url('vendor/imagesloaded/imagesloaded.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // initialization of masonry
            $('.masonry-grid').imagesLoaded().then(function () {
                $('.masonry-grid').masonry({
                    columnWidth: '.masonry-grid-sizer',
                    itemSelector: '.masonry-grid-item',
                    percentPosition: true
                });
            });

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox', {
                transitionEffect: false
            });
        });
    </script>
@endpush