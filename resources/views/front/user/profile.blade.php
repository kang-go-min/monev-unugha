@extends('layouts.master')
@section('content')
    <!-- Alumni Articles -->
    <div class="g-pos-rel">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-md-4 col-lg-3 g-pt-100">
                    <h3 class="mb-4">Menu User</h3>

                    <!-- Links List -->
                    <ul class="nav list-unstyled mb-5 d-block" role="tablist" data-target="nav-profile"
                        data-tabs-mobile-type="slide-up-down">
                        <li class="py-1 nav-item d-block">
                            <a class="nav-link d-block active u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                               data-toggle="tab" href="#edit-profile" role="tab">
                                <i class="align-middle mr-3 icon-education-083 u-line-icon-pro"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li class="py-1 nav-item d-block">
                            <a class="nav-link d-block u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                               data-toggle="tab" href="#setting-security" role="tab">
                                <i class="align-middle mr-3 icon-finance-135 u-line-icon-pro"></i>
                                Setting Security
                            </a>
                        </li>

                    </ul>
                    <!-- End Links List -->
                </div>

                <div class="col-md-8 g-pt-50 g-pt-50--md g-pb-70 tab-content" id="nav-profile">

                    @include('partials.notifications')

                    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel"
                         data-parent="#nav-profile">
                        <h2 class="h4 g-font-weight-300">Manage your Name, ID and Email Addresses</h2>
                        <p>Below are name, email addresse, contacts and more on file for your account.</p>

                        {{--<form action="{{route('profile/update/profile')}}" method="post">
                            {!! @csrf_field() !!}--}}
                            <ul class="list-unstyled g-mb-30">
                                <!-- Name -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong
                                            class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Nama</strong>
                                        <span class="align-top">{{$profile->name}}</span>
                                    </div>
                                    {{--<span>
                                    <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                    </span>--}}
                                </li>
                                <!-- End Name -->

                                <!-- Your ID -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong
                                            class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">NIK/NIM</strong>
                                        <span class="align-top">{{$profile->id_card}}</span>
                                    </div>
                                    {{--<span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                    </span>--}}
                                </li>
                                <!-- End Your ID -->
                                {{--
                                <!-- Company Name -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Jenis
                                            Kelamin</strong>
                                        <span class="align-top">{{$profile->jenis_kelamin}}</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Company Name -->

                                <!-- Phone Number -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Telepon/HP</strong>
                                        <span class="align-top">{{$profile->phone}}</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Phone Number -->

                                <!-- Office Number -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Email</strong>
                                        <span class="align-top">{{$profile->email}}</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Office Number -->

                                <!-- Address -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Alamat</strong>
                                        <span class="align-top">$profile->address</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Address -->

                                <!-- Position -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Agama</strong>
                                        <span class="align-top">$profile->agama->nama</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Position -->

                                <!-- Pendidiakan -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Pendidikan</strong>
                                        <span class="align-top">$profile->pendidikan->nama</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- Pendidikan -->

                                <!-- Linked Account -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Pekerjaan</strong>
                                        <span class="align-top">$profile->pekerjaan->nama</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Linked Account -->

                                <!-- Website -->
                                <li class="d-flex align-items-center justify-content-between g-brd-bottom g-brd-gray-light-v4 g-py-15">
                                    <div class="g-pr-10">
                                        <strong class="d-block d-md-inline-block g-color-gray-dark-v2 g-width-200 g-pr-10">Penghasilan</strong>
                                        <span class="align-top">$profile->penghasilan->nama</span>
                                    </div>
                                    <span>
                                        <i class="icon-education-063 u-line-icon-pro g-color-gray-dark-v5 g-color-primary--hover g-cursor-pointer g-pos-rel g-top-1"></i>
                                        </span>
                                </li>
                                <!-- End Website -->--}}

                            </ul>

                            {{--<div class="text-sm-right">
                                <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                                <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#">Save
                                    Changes
                                </button>
                            </div>
                        </form>--}}
                    </div>

                    <div class="tab-pane fade" id="setting-security" role="tabpanel" data-parent="#nav-profile">
                        <h2 class="h4 g-font-weight-300">Security Settings</h2>
                        <p class="g-mb-25">Reset your password, change verifications and so on.</p>

                        <form action="{{route('profile/update/security')}}" method="post">
                        {!! @csrf_field() !!}
                        <!-- Current Password -->
                            <div class="form-group row g-mb-25">
                                <label
                                    class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Current
                                    password</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input
                                            class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                            type="password" placeholder="Current password" name="current_password">
                                        <div class="input-group-append">
                                                <span
                                                    class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i
                                                        class="icon-finance-135 u-line-icon-pro"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Current Password -->

                            <!-- New Password -->
                            <div class="form-group row g-mb-25">
                                <label
                                    class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">New
                                    password</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input
                                            class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                            type="password" placeholder="New password" name="password">
                                        <div class="input-group-append">
                                                <span
                                                    class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i
                                                        class="icon-finance-135 u-line-icon-pro"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End New Password -->

                            <!-- Verify Password -->
                            <div class="form-group row g-mb-25">
                                <label
                                    class="col-sm-3 col-form-label g-color-gray-dark-v2 g-font-weight-700 text-sm-right g-mb-10">Verify
                                    password</label>
                                <div class="col-sm-9">
                                    <div class="input-group g-brd-primary--focus">
                                        <input
                                            class="form-control form-control-md border-right-0 rounded-0 g-py-13 pr-0"
                                            type="password" placeholder="Verify password"
                                            name="password_confirmation">
                                        <div class="input-group-append">
                                                <span
                                                    class="input-group-text g-bg-white g-color-gray-light-v1 rounded-0"><i
                                                        class="icon-finance-135 u-line-icon-pro"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Verify Password -->

                            <hr class="g-brd-gray-light-v4 g-my-25">

                            <div class="text-sm-right">
                                <a class="btn u-btn-darkgray rounded-0 g-py-12 g-px-25 g-mr-10" href="#">Cancel</a>
                                <button type="submit" class="btn u-btn-primary rounded-0 g-py-12 g-px-25" href="#">Save
                                    Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div
                class="col-12 col-md-5 col-lg-4 h-100 g-bg-secondary-gradient-v1 g-pos-abs g-top-0 g-left-0 g-z-index-minus-1"></div>
        </div>
    </div>
    <!-- End Alumni Articles -->
@stop

@push('scripts')
    <!-- JS Unify -->
    <script src="{{url('themes/default/js/components/hs.tabs.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function () {
            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        });

        $(window).on('resize', function () {
            setTimeout(function () {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>
@endpush
