<!-- Carousel -->
<div id="carouselCus3" class="js-carousel" data-infinite="true" data-fade="true"
     data-lazy-load="ondemand"
     data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-45 g-height-45 g-font-size-30 g-color-gray-dark-v4 g-color-primary--hover"
     data-arrow-left-classes="fa fa-angle-left g-left-0 g-left-40--lg"
     data-arrow-right-classes="fa fa-angle-right g-right-0 g-right-40--lg"
     data-nav-for="#carouselCus4">
    @foreach($dewan->sortByDesc('is_ketua') as $dw)
        <div class="js-slide">
            <!-- Team -->
            <div class="row justify-content-center align-items-center no-gutters">
                <div class="col-sm-4 col-lg-4 g-bg-size-cover g-bg-pos-top-center g-min-height-400"
                     data-bg-img-src="{{$dw->foto}}"></div>
                <div class="col-sm-8 col-lg-8">
                    <div class="g-px-30 g-px-50--lg g-py-60">
                        <h3 class="h4 mb-1">{{$dw->nama_calon}}</h3>
                        <span class="d-block mb-4">{{$dw->is_ketua ? 'Ketua' : 'Anggota'}} Fraksi</span>
                        <p class="mb-4">
                            Daerah Pemilihan {{ Str::title($dw->dapil->nama_dapil) }}
                            <ol>
                            @foreach($dw->dapil->wilayah as $wilayah)
                                <li>{{$wilayah['wilayah']}}</li>
                            @endforeach
                            </ol>
                        </p>

                        <!-- Social Icons -->
                        <ul class="list-inline mb-3">
                            <li class="list-inline-item g-mx-2">
                                <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-blue g-bg-blue-opacity-0_1 g-color-blue--hover rounded-circle"
                                   href="https://www.facebook.com/htmlstream">
                                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
                                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item g-mx-2">
                                <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-cyan g-bg-cyan-opacity-0_1 g-color-cyan--hover rounded-circle"
                                   href="https://twitter.com/htmlstream">
                                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
                                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item g-mx-2">
                                <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-bluegray g-bg-bluegray-opacity-0_1 g-color-bluegray--hover rounded-circle"
                                   href="https://github.com/htmlstream">
                                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-github"></i>
                                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-github"></i>
                                </a>
                            </li>
                            <li class="list-inline-item g-mx-2">
                                <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-red g-bg-red-opacity-0_1 g-color-red--hover rounded-circle"
                                   href="https://dribbble.com/htmlstream">
                                    <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-dribbble"></i>
                                    <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-dribbble"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Social Icons -->
                    </div>
                </div>
            </div>
            <!-- End Team -->
        </div>
    @endforeach
</div>

<div id="carouselCus4" class="js-carousel text-center u-carousel-v3 g-mx-minus-15"
     data-infinite="true" data-center-mode="true" data-slides-show="5" data-is-thumbs="true"
     data-lazy-load="ondemand" data-nav-for="#carouselCus3">
    @foreach($dewan->sortByDesc('is_ketua') as $dw)
        <div class="js-slide g-opacity-1 g-cursor-pointer g-px-15">
            <img class="img-fluid mb-3" src="{{$dw->foto}}"
                 alt="Image Description">
            <h3 class="h6 g-color-gray-dark-v4">{{$dw->nama_calon}}</h3>
        </div>
    @endforeach
</div>
<!-- End Carousel -->