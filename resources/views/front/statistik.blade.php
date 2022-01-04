@extends('layouts.master')
@section('content')
    <div class="container g-pt-70 g-pb-100">
        <div class="row">
            <!-- Counter Pie Chart -->
            <div class="col-lg-6 g-mb-60">
                <div class="d-flex">
                    <div class="js-pie-rtl u-chart-pie-v1 g-brd-primary g-color-black g-height-140 g-width-140 g-mr-30"
                         data-circles-value="{{$aspirasi['Belum Verifikasi']}}" data-circles-max-value="{{$total}}" data-circles-bg-color="#ffffff"
                         data-circles-fg-color="#72c02c" data-circles-radius="70" data-circles-stroke-width="2"
                         data-circles-font-size="35" data-circles-duration="2000" data-circles-scroll-animate="true">
                    </div>

                    <div class="align-self-center g-line-height-2">
                        <h4 class="h6 text-uppercase g-font-weight-700 g-color-black g-mb-15">Belum Verifikasi</h4>
                        <p class="mb-0">Sed feugiat porttitor nunc Etiam gravida ex justo ac rhoncus purus tristique ut,
                            egestas a libero eget, sollicitudin maximus nulla. Nunc vitae maximus ipsum.</p>
                    </div>
                </div>
            </div>
            <!-- End Counter Pie Chart -->

            <!-- Counter Pie Chart -->
            <div class="col-lg-6 g-mb-60">
                <div class="d-flex">
                    <div class="js-pie-rtl u-chart-pie-v1 g-brd-primary g-color-black g-height-140 g-width-140 g-mr-30"
                         data-circles-value="{{$aspirasi['Verifikasi']}}" data-circles-max-value="{{$total}}}" data-circles-bg-color="#ffffff"
                         data-circles-fg-color="#72c02c" data-circles-radius="70" data-circles-stroke-width="2"
                         data-circles-font-size="35" data-circles-duration="2000" data-circles-scroll-animate="true">
                    </div>

                    <div class="align-self-center g-line-height-2">
                        <h4 class="h6 text-uppercase g-font-weight-700 g-color-black g-mb-15">Terverifikasi</h4>
                        <p class="mb-0">Sed feugiat porttitor nunc Etiam gravida ex justo ac rhoncus purus tristique ut,
                            egestas a libero eget, sollicitudin maximus nulla. Nunc vitae maximus ipsum.</p>
                    </div>
                </div>
            </div>
            <!-- End Counter Pie Chart -->
        </div>

        <div class="row">

            <!-- Counter Pie Chart -->
            <div class="col-lg-6 g-mb-60">
                <div class="d-flex">
                    <div class="js-pie-rtl u-chart-pie-v1 g-brd-primary g-color-black g-height-140 g-width-140 g-mr-30"
                         data-circles-value="{{$aspirasi['Terealisasi']}}" data-circles-max-value="{{$total}}" data-circles-bg-color="#ffffff"
                         data-circles-fg-color="#72c02c" data-circles-radius="70" data-circles-stroke-width="2"
                         data-circles-font-size="35" data-circles-duration="2000" data-circles-scroll-animate="true">
                    </div>

                    <div class="align-self-center g-line-height-2">
                        <h4 class="h6 text-uppercase g-font-weight-700 g-color-black g-mb-15">Terealisasi</h4>
                        <p class="mb-0">Sed feugiat porttitor nunc Etiam gravida ex justo ac rhoncus purus tristique ut,
                            egestas a libero eget, sollicitudin maximus nulla. Nunc vitae maximus ipsum.</p>
                    </div>
                </div>
            </div>
            <!-- End Counter Pie Chart -->

            <!-- Counter Pie Chart -->
            <div class="col-lg-6 g-mb-60">
                <div class="d-flex">
                    <div class="js-pie-rtl u-chart-pie-v1 g-brd-primary g-color-black g-height-140 g-width-140 g-mr-30"
                         data-circles-value="{{$aspirasi['Tidak Terealisasi']}}" data-circles-max-value="{{$total}}" data-circles-bg-color="#ffffff"
                         data-circles-fg-color="#72c02c" data-circles-radius="70" data-circles-stroke-width="2"
                         data-circles-font-size="35" data-circles-duration="2000" data-circles-scroll-animate="true">
                    </div>

                    <div class="align-self-center g-line-height-2">
                        <h4 class="h6 text-uppercase g-font-weight-700 g-color-black g-mb-15">Tidak Terealisasi</h4>
                        <p class="mb-0">Sed feugiat porttitor nunc Etiam gravida ex justo ac rhoncus purus tristique ut,
                            egestas a libero eget, sollicitudin maximus nulla. Nunc vitae maximus ipsum.</p>
                    </div>
                </div>
            </div>
            <!-- End Counter Pie Chart -->

            <!-- Counter Pie Chart -->
            <div class="col-lg-6 g-mb-60">
                <div class="d-flex">
                    <div class="js-pie-rtl u-chart-pie-v1 g-brd-primary g-color-black g-height-140 g-width-140 g-mr-30"
                         data-circles-value="{{$aspirasi['Proses E-Pokir']}}" data-circles-max-value="{{$total}}" data-circles-bg-color="#ffffff"
                         data-circles-fg-color="#72c02c" data-circles-radius="70" data-circles-stroke-width="2"
                         data-circles-font-size="35" data-circles-duration="2000" data-circles-scroll-animate="true">
                    </div>

                    <div class="align-self-center g-line-height-2">
                        <h4 class="h6 text-uppercase g-font-weight-700 g-color-black g-mb-15">Proses E-Pokir</h4>
                        <p class="mb-0">Sed feugiat porttitor nunc Etiam gravida ex justo ac rhoncus purus tristique ut,
                            egestas a libero eget, sollicitudin maximus nulla. Nunc vitae maximus ipsum.</p>
                    </div>
                </div>
            </div>
            <!-- End Counter Pie Chart -->
        </div>
    </div>
@stop

@push('scripts')
    <!-- JS Implementing Plugins -->
    <script  src="{{ url('vendor/appear.js') }}"></script>
    <script  src="{{ url('vendor/circles/circles.min.js') }}"></script>
    <!-- JS Unify -->
    <script  src="{{ url('themes/default/js/components/hs.chart-pie.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script >
        $(document).on('ready', function () {
            // initialization of chart pies with rtl option
            var rtlItems = $.HSCore.components.HSChartPie.init('.js-pie-rtl', {
                rtl: true
            });
        });
    </script>
@endpush