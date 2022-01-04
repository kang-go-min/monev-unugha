<!-- Header -->
<header id="js-header" class="u-header">
    <div class="u-header__section">
        <!-- Topbar -->
        <div class="g-bg-main g-pt-10 g-pb-10">
            <div class="container g-py-5">
                <ul class="list-inline d-flex align-items-center g-mb-0">
                    <li class="list-inline-item d-none d-lg-inline-block">
                        <a class="u-link-v5 g-brd-around g-brd-white-opacity-0_2 g-color-white-opacity-0_7 g-color-white--hover g-font-size-12 g-rounded-20 text-uppercase g-px-20 g-py-10"
                           href="https://unugha.ac.id/" target="_blank">Website UNUGHA</a>
                    </li>

                    <!-- Jump To -->
                    <li class="list-inline-item g-pos-rel ml-lg-auto">
                        <a id="jump-to-dropdown-invoker"
                           class="d-block d-lg-none u-link-v5 g-color-white-opacity-0_7 g-color-white--hover g-font-size-12 text-uppercase g-py-7"
                           href="#"
                           aria-controls="jump-to-dropdown"
                           aria-haspopup="true"
                           aria-expanded="false"
                           data-dropdown-event="hover"
                           data-dropdown-target="#jump-to-dropdown"
                           data-dropdown-type="css-animation"
                           data-dropdown-duration="0"
                           data-dropdown-hide-on-scroll="true"
                           data-dropdown-animation-in="fadeIn"
                           data-dropdown-animation-out="fadeOut">
                            Manu
                            <i class="g-ml-3 fa fa-angle-down"></i>
                        </a>
                        <ul id="jump-to-dropdown"
                            class="list-unstyled u-shadow-v39 g-brd-around g-brd-4 g-brd-white g-bg-secondary g-pos-abs g-left-0 g-z-index-99 g-mt-13"
                            aria-labelledby="jump-to-dropdown-invoker">
                            <li class="dropdown-item g-brd-bottom g-brd-2 g-brd-white g-px-0 g-py-2">
                                <a class="nav-link g-color-main g-color-primary--hover g-bg-secondary-dark-v2--hover g-font-size-default"
                                   href="#">Pusat Bantuan</a>
                            </li>
                            @auth
                                <li class="dropdown-item g-brd-bottom g-brd-2 g-brd-white g-px-0 g-py-2">
                                    <a class="nav-link g-color-main g-color-primary--hover g-bg-secondary-dark-v2--hover g-font-size-default"
                                       href="{{ route('survey/index') }}">Survey Saya</a>
                                </li>
                                <li class="dropdown-item g-brd-bottom g-brd-2 g-brd-white g-px-0 g-py-2">
                                    <a class="nav-link g-color-main g-color-primary--hover g-bg-secondary-dark-v2--hover g-font-size-default"
                                       href="{{route('profile/index')}}">User Profile</a>
                                </li>
                            @endauth
                            <li class="dropdown-item g-px-0 g-py-2">
                                @auth
                                    <a class="nav-link g-color-white g-bg-primary g-bg-primary-light-v1--hover g-font-size-default"
                                       href="{{route('logout')}}"
                                       onclick="event.preventDefault(); document.getElementById('frm-logout1').submit();">Sign
                                        out</a>
                                    <form id="frm-logout1" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @else
                                    <a class="nav-link g-color-white g-bg-primary g-bg-primary-light-v1--hover g-font-size-default"
                                       href="{{route('login')}}">Sign in</a>
                                @endauth
                            </li>
                        </ul>
                    </li>
                    <!-- End Jump To -->

                    <!-- Links -->
                    <li class="list-inline-item d-none d-lg-inline-block">
                        <a class="u-link-v5 g-color-white-opacity-0_7 g-color-white--hover g-font-size-12 text-uppercase g-px-10 g-py-15"
                           href="#">Pusat Bantuan</a>
                    </li>
                    @auth
                        <li class="list-inline-item d-none d-lg-inline-block">
                            <a class="u-link-v5 g-color-white-opacity-0_7 g-color-white--hover g-font-size-12 text-uppercase g-px-10 g-py-15"
                               href="{{ route('survey/index') }}">Survey Saya</a>
                        </li>
                        <li class="list-inline-item d-none d-lg-inline-block">
                            <a class="u-link-v5 g-color-white-opacity-0_7 g-color-white--hover g-font-size-12 text-uppercase g-px-10 g-py-15"
                               href="{{route('profile/index')}}">User Profile</a>
                        </li>
                    @endauth
                    <li class="list-inline-item d-none d-lg-inline-block">
                        @auth
                            <a class="u-link-v5 u-shadow-v19 g-color-black--hover g-bg-primary g-color-white g-bg-red--hover g-font-size-12 text-uppercase g-rounded-20 g-px-18 g-py-8 g-ml-10"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('frm-logout2').submit();">Sign
                                Out</a>
                            <form id="frm-logout2" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @else
                            <a class="u-link-v5 u-shadow-v19 g-color-white--hover g-bg-white g-bg-primary--hover g-font-size-12 text-uppercase g-rounded-20 g-px-18 g-py-8 g-ml-10"
                               href="{{ route('login') }}">Sign in</a>
                        @endauth
                    </li>
                    <!-- End Links -->

                </ul>
            </div>
        </div>
        <!-- End Topbar -->

        <div class="container">
            <!-- Nav -->
            <nav class="js-mega-menu navbar navbar-expand-lg g-px-0 g-py-5 g-py-0--lg">
                <!-- Logo -->
                <a class="d-flex navbar-brand g-max-width-170 g-max-width-200--lg text-dark g-py-0" href=".">
                    <img class="img-fluid g-hidden-lg-down" width="70" src="{{url('images/unugha.png')}}"
                         alt="Logo">
                    <img class="img-fluid g-width-80 g-hidden-md-down g-hidden-xl-up" width="60"
                         src="{{url('images/unugha.png')}}" alt="Logo">
                    <img class="img-fluid g-hidden-lg-up" width="60" src="{{url('images/unugha.png')}}" alt="Logo">

                    <span class="d-inline-block g-text-underline--none--hover g-mt-10 g-mx-5">
                        <span class="d-block g-brd-bottom g-brd-1 g-brd-primary g-color-primary g-font-size-16 g-font-weight-600 text-center g-line-height-1_4">MONEV</span>
                        <span class="d-block g-font-secondary g-font-size-20 g-font-size-25--md g-line-height-1">UNUGHA</span>
                    </span>
                </a>
                <!-- End Logo -->

                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0"
                        type="button"
                        aria-label="Toggle navigation"
                        aria-expanded="false"
                        aria-controls="navBar"
                        data-toggle="collapse"
                        data-target="#navBar">
                <span class="hamburger hamburger--slider g-px-0">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Navigation -->
                <div id="navBar" class="collapse navbar-collapse">
                    <ul class="navbar-nav align-items-lg-center g-py-30 g-py-0--lg ml-auto">
                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/index')}}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/report')}}">
                            Laporan
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/dewan')}}">
                                Anggota Dewan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/event')}}">
                                Kegiatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/galeri')}}">
                                Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link g-color-primary--hover g-font-size-15 g-font-size-17--xl g-px-15--lg g-py-10 g-py-30--lg"
                               href="{{route('front/statistik')}}">
                                Statistik
                            </a>
                        </li>--}}
                    </ul>
                </div>
                <!-- End Navigation -->
            </nav>
            <!-- End Nav -->
        </div>
    </div>
</header>
<!-- End Header -->
