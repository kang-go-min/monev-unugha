<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    <title>MONEV - UNUGHA</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('favicon.ico')}}">

    <!-- CSRF Token -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:300,400,400i,500,700%7CAlegreya:400" rel="stylesheet">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{url('vendor/bootstrap/bootstrap.min.css')}}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{url('vendor/icon-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{url('vendor/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{url('vendor/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{url('vendor/icon-material/material-icons.css') }}">
    <link rel="stylesheet" href="{{url('vendor/animate.css') }}">
    <link rel="stylesheet" href="{{url('vendor/hs-megamenu/src/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{url('vendor/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{url('vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{url('vendor/fancybox/jquery.fancybox.css') }}">

    <!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{url('themes/default/css/styles.multipage-education.css') }}">

    @stack('styles')
{{--    <link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}

    <!-- CSS Customization -->
    {{--<link rel="stylesheet" href="{{url('css/custom.css')}}">--}}
</head>
<body>
<main>
    <div>@include('partials.header')</div>

    @yield('content')

    <div>@include('partials.footer')</div>

    <!-- Go to Top -->
    <a class="js-go-to u-go-to-v1 u-shadow-v32 g-width-40 g-height-40 g-color-primary g-color-white--hover g-bg-white g-bg-main--hover g-bg-main--focus g-font-size-12 rounded-circle"
       href="#" data-type="fixed" data-position='{
       "bottom": 15,
       "right": 15
     }' data-offset-top="400"
       data-compensation="#js-header"
       data-show-effect="slideInUp"
       data-hide-effect="slideInDown">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
    <!-- End Go to Top -->
</main>


<!-- JS Global Compulsory -->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
<script src="{{url('vendor/popper.js/popper.min.js')}}"></script>
<script src="{{url('vendor/bootstrap/bootstrap.min.js')}}"></script>

<!-- JS Implementing Plugins -->
<script src="{{url('vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{url('vendor/slick-carousel/slick/slick.js')}}"></script>
<script src="{{url('vendor/fancybox/jquery.fancybox.min.js')}}"></script>

<!-- JS Unify -->
<script src="{{url('themes/default/js/hs.core.js')}}" ></script>
<script src="{{url('themes/default/js/components/hs.header.js')}}"></script>
<script src="{{url('themes/default/js/helpers/hs.hamburgers.js')}}"></script>
<script src="{{url('themes/default/js/components/hs.dropdown.js')}}"></script>
<script src="{{url('themes/default/js/helpers/hs.height-calc.js')}}"></script>
<script src="{{url('themes/default/js/components/hs.carousel.js')}}"></script>
<script src="{{url('themes/default/js/components/hs.popup.js')}}"></script>
<script src="{{url('themes/default/js/components/hs.go-to.js')}}"></script>

<!-- JS Customization -->
<script src="{{mix('js/app.js')}}"></script>
{{--<script src="{{url('js/custom.js')}}"></script>--}}

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });

        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
            afterOpen: function () {
                $(this).find('input[type="search"]').focus();
            }
        });

        // initialization of carousel
        $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

        // initialization of header's height equal offset
        $.HSCore.helpers.HSHeightCalc.init();

        // initialization of popups
        $.HSCore.components.HSPopup.init('.js-fancybox');

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });
</script>
@stack('scripts')
</body>
</html>
