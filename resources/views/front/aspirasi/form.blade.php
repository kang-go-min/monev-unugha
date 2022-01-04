@extends('layouts.master')
{{--@extends('brackets/admin-ui::admin.layout.master')--}}
@section('content')
    <div class="container g-pt-50 g-pb-50 g-pb-130--lg">
        <div class="row align-items-lg-center no-gutters">
            <div class="col-lg-7 g-mb-50 g-mb-20--lg">
                <!-- Entry Fees & How to Apply -->
                @include('partials.notifications')

                <form method="post" action="{{route('aspirasi/store')}}"
                      enctype="multipart/form-data">
                    <div class="u-shadow-v36">
                        {!! @csrf_field() !!}
                        <div class="g-bg-main-light-v2">
                            <header class="g-brd-bottom g-brd-white-opacity-0_1 text-center g-pa-30">
                                <h3 class="h4 g-color-white g-font-primary g-font-weight-400 mb-0">Sampaikan
                                    Aspirasi Anda</h3>
                            </header>

                            <div class="g-pa-40">
                                <p class="g-color-white-opacity-0_6 text-center g-mb-40">Aspirasi yang anda
                                    sampaikan ditujukan kepada wakil anda sesuai daerah pemilihan</p>

                                <!-- Select Inputs -->
                                <div class="row">
                                    <div class="col-6 g-mb-30">
                                        <!-- Start In -->
                                        <label class="g-color-white-opacity-0_5 g-font-size-15 mb-3">Kategori
                                            Aspirasi</label>
                                        <select class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-cyan--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                                data-placeholder="2018"
                                                data-open-icon="fa fa-angle-down"
                                                data-close-icon="fa fa-angle-up"
                                                name="kategori_id">
                                            @foreach($kategori as $kat)
                                                <option class="g-brd-secondary-light-v2 g-color-text-light-v1 g-font-weight-500 g-color-white--active g-bg-primary--active"
                                                        value="{{$kat->id}}">{{$kat->nama_kategori}}
                                                </option>
                                                @if ($kat->children)
                                                    @foreach($kat->children as $kat2)
                                                        <option class="g-brd-secondary-light-v2 g-color-text-light-v1 g-font-weight-500 g-color-white--active g-bg-primary--active"
                                                                value="{{$kat2->id}}">
                                                            &nbsp;&nbsp; {{$kat2->nama_kategori}}
                                                        </option>
                                                        @if ($kat2->children)
                                                            @foreach($kat2->children as $kat3)
                                                                <option class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                                                        value="{{$kat3->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$kat3->nama_kategori}}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-6 g-mb-30">
                                        <!-- I am -->
                                        <label class="g-color-white-opacity-0_5 g-font-size-15 mb-3">Anggota Dewan
                                            yang dituju </label>
                                        <select class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-cyan--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                                data-placeholder="a Canadian citizen"
                                                data-open-icon="fa fa-angle-down"
                                                data-close-icon="fa fa-angle-up"
                                                name="caleg_id">
                                            @foreach ($dewan as $dw)
                                                <option class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                                        value="{{$dw->id}}">{{$dw->nama_calon}}
                                                    ({{$dw->parpol->singkatan}})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <h3 class="g-color-white-opacity-0_5 g-font-primary g-font-weight-400 g-font-size-15 mb-3">
                                    Aspirasi</h3>

                                <div class="row mb-0">
                                    <div class="col-12 g-mb-10">
                                                <textarea name="aspirasi" class="form-control form-control-md rounded-0"
                                                          rows="5" placeholder="Aspirasi Anda"></textarea>
                                        {{--                                            <wysiwyg v-model="form.aspirasi" v-validate="''" id="aspirasi" name="aspirasi" :config="mediaWysiwygConfig"></wysiwyg>--}}
                                    </div>
                                </div>
                                <!-- End Select Inputs -->

                                {{--<div class="form-group mb-0" id="my-dropzone">
                                    <label class="g-mb-10 g-color-white-opacity-0_5 g-font-primary g-font-weight-400 g-font-size-15 mb-3">Lampiran</label>
                                    <input class="js-file-attachment" type="file" name="file" multiple>
                                </div>--}}

                                <h3 class="g-color-white-opacity-0_5 g-font-primary g-font-weight-400 g-font-size-15 mb-3">
                                    Lampiran</h3>
                                <div class="row mb-0">
                                    <input type="hidden" name="lampiran">
                                    <div class="col-12 g-mb-10" id="fine-uploader-manual-trigger"></div>
                                </div>

                                <p class="g-color-white-opacity-0_6 text-center mb-0">Aspirasi yang anda kirim akan
                                    divalidasi oleh petugas sebelum di teruskan ke Anggota Dewan yang dituju.</p>
                            </div>
                        </div>

                        <footer>
                            <button type="submit"
                                    class="btn btn-block g-color-blue g-color-white--hover g-bg-main-light-v1 g-font-size-16 text-center rounded-0 g-pa-20">
                                Submit Aspirasi
                                <i class="g-font-size-15 g-pos-rel g-top-4 ml-2 material-icons">arrow_forward</i>
                            </button>
                        </footer>
                    </div>
                </form>
                <!-- End Entry Fees & How to Apply -->
            </div>

             <div class="col-lg-5 g-mb-50 g-mb-20--lg">
                 <!-- Facts & Figures -->
                 <div class="u-shadow-v36">
                     <header class="g-brd-bottom g-brd-secondary-light-v2 g-bg-white text-center g-pa-30">
                         <h3 class="h4 g-font-primary g-font-weight-400 mb-0">Anggota Dewan</h3>
                         <h5 class="h5 g-font-primary mb-0">Daerah Pemilihan {{ Str::title($dapil->nama_dapil) }}</h5>
                     </header>

                     <div class="g-bg-white g-px-10 g-py-10">
                         <div class="js-carousel"
                              data-infinite="true"
                              data-slides-show="1"
                              data-slides-scroll="1"
                              data-arrows-classes="u-icon-v3 g-width-45 g-height-45 g-absolute-centered--y g-color-white g-color-white--hover g-bg-main g-bg-primary--hover rounded g-pa-12"
                              data-arrow-left-classes="fa fa-angle-left g-left-40"
                              data-arrow-right-classes="fa fa-angle-right g-right-40"
                              data-center-mode="true"
                              data-center-padding="10px"
                              data-responsive='[{
                            "breakpoint": 992,
                            "settings": {
                              "slidesToShow": 2,
                              "centerPadding": 30
                            }
                          }, {
                            "breakpoint": 768,
                            "settings": {
                              "slidesToShow": 2,
                              "centerPadding": 30
                            }
                          }, {
                            "breakpoint": 554,
                            "settings": {
                              "slidesToShow": 1,
                              "centerPadding": 30
                            }
                          }]'>

                         @foreach($dewan as $dewan)
                             <!-- Team Block -->
                                 <figure class="js-slide">
                                     <!-- Figure Image -->
                                     <img class="w-50 g-relative-centered--x" src="{{ $dewan->foto}}"
                                          alt="Image Description">
                                     <!-- End Figure Image-->

                                     <!-- Figure Info -->
                                     <div class="text-center g-bg-white g-pa-25">
                                         <div class="g-mb-15">
                                             <h4 class="h5 g-color-black g-mb-5">({{$dewan->nomor_calon}}) {{$dewan->nama_calon}}</h4>
                                             <em class="d-block g-font-style-normal g-font-size-11 text-uppercase g-color-primary">{{$dewan->parpol->nama_parpol}}
                                                 ({{$dewan->parpol->singkatan}})</em>
                                         </div>
                                         <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p>

                                         <hr class="g-brd-gray-light-v4 my-4">

                                         <!-- Figure Social Icons -->
                                         <ul class="list-inline mb-0">
                                             <li class="list-inline-item g-mx-2">
                                                 <a class="u-icon-v2 u-icon-size--xs g-color-facebook g-brd-facebook g-color-white--hover g-bg-facebook--hover rounded-circle"
                                                    href="#" data-toggle="tooltip" data-original-title="Facebook">
                                                     <i class="fa fa-facebook"></i>
                                                 </a>
                                             </li>
                                             <li class="list-inline-item g-mx-2">
                                                 <a class="u-icon-v2 u-icon-size--xs g-color-twitter g-brd-twitter g-color-white--hover g-bg-twitter--hover rounded-circle"
                                                    href="#" data-toggle="tooltip" data-original-title="Twitter">
                                                     <i class="fa fa-twitter"></i>
                                                 </a>
                                             </li>
                                             <li class="list-inline-item g-mx-2">
                                                 <a class="u-icon-v2 u-icon-size--xs g-color-google-plus g-brd-google-plus g-color-white--hover g-bg-google-plus--hover rounded-circle"
                                                    href="#" data-toggle="tooltip" data-original-title="Google Plus">
                                                     <i class="fa fa-google-plus"></i>
                                                 </a>
                                             </li>
                                         </ul>
                                         <!-- End Figure Social Icons -->
                                     </div>
                                     <!-- End Figure Info-->
                                 </figure>
                                 <!-- End Figure -->
                             @endforeach
                         </div>
                     </div>
                     <footer>
                         <a class="btn btn-block g-color-main g-color-primary--hover g-bg-secondary g-font-size-16 text-center rounded-0 g-pa-20"
                            href="{{route('front/dewan')}}">
                             Lihat Semua Anggota Dewan
                             <i class="g-font-size-15 g-pos-rel g-top-4 ml-2 material-icons">arrow_forward</i>
                         </a>
                     </footer>
                 </div>
                 <!-- End Facts & Figures -->
             </div>
        </div>
    </div>
@stop

@push('styles')
    <link rel="stylesheet" href="{{url('vendor/fine-uploader/fine-uploader-new.min.css') }}">
@endpush

@push('scripts')
    <!-- JS Implementing Plugins -->

    <script src="{{url('vendor/fine-uploader/jquery.fine-uploader.min.js')}}"></script>

    <script type="text/template" id="qq-template-manual-trigger">
        <div class="qq-uploader-selector qq-uploader rounded-0" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                     class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="buttons">
                <div class="qq-upload-button-selector btn btn-sm btn-primary rounded-0 g-font-size-14 text-center align-middle">
                    <div>Select files</div>
                </div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                             class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    {{--                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon"--}}
                    {{--                          aria-label="Edit filename"></span>--}}
                    {{--                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">--}}
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <!-- JS Plugins Init. -->
    <script>
        var token = document.head.querySelector('meta[name="csrf-token"]');
        var data = [];

        $(document).on('ready', function () {
            $('#fine-uploader-manual-trigger').fineUploader({
                template: 'qq-template-manual-trigger',
                request: {
                    endpoint: '{{route('aspirasi/upload')}}',
                    customHeaders: {
                        'X-CSRF-TOKEN': token.content
                    }
                },
                deleteFile: {
                    enabled: true,
                    forceConfirm: true,
                    endpoint: '{{route('aspirasi/upload')}}'
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: '{{ asset('vendor/fine-uploader/placeholders/waiting-generic.png')}}',
                        notAvailablePath: '{{asset('vendor/fine-uploader/placeholders/not_available-generic.png')}}'
                    }
                },
                image: {
                    minHeight: 300,
                    minWidth: 300
                },
                validation: {
                    allowedExtensions: ['jpeg', 'jpg', 'gif', 'png'],
                    itemLimit: 3
                },
                callbacks: {
                    onComplete: function (id, name, res) {
                        data.push(res);
                    },
                    onAllComplete: function () {
                        $("input[name='lampiran']").val(JSON.stringify(data));
                    }
                }
            });


            // $('#trigger-upload').click(function (e) {
            /*$('form').bind('submit', function (e) {
                e.preventDefault();
                data.forEach(function (item) {
                    $("input[name='lampiran[]']").val(JSON.stringify(item));
                })
                // $('#fine-uploader-manual-trigger').fineUploader('uploadStoredFiles');
            });*/

        });
    </script>
@endpush