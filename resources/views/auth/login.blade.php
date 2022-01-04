@extends('layouts.master')

@section('content')
    <!-- Signin Form -->
    <div class="g-bg-img-hero g-bg-pos-top-center" style="background-image: url(themes/default/include/svg/svg-bg2.svg);">
        <div class="container g-pt-100 g-pb-100 g-pb-130--lg">
            @include('partials.notifications')
            <div class="g-pos-rel">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Heading -->
                        <div class="g-mb-40">
                            <h2 class="h1 mb-3">{{ __('Login') }}</h2>
                            <p>By signing in you will be authorized to access your applications and web sites that use
                                the Sign in Service. Use is subject to but not limited to the policies and guidelines
                                listed below in <a href="#">Policies and guidelines</a>.</p>
                        </div>
                        <!-- End Heading -->
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="col-md-6 col-lg-5 order-md-2 g-pos-abs--md g-top-0 g-right-0">
                        <!-- Contact Form -->
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Signin -->
                            <div id="signin">
                                <div class="u-shadow-v35 g-bg-white rounded g-px-40 g-py-50">
                                    <div class="g-mb-20">
                                        <label class="g-color-text-light-v1 g-font-weight-500">Email/NIK/NIM</label>
                                        <div class="input-group">
                                          <span class="input-group-prepend g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                            <div class="input-group-text justify-content-center w-100 g-bg-secondary g-brd-secondary-light-v2">
                                              <i class="icon-education-166 u-line-icon-pro"></i>
                                            </div>
                                          </span>
                                            <input id="login" class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12 @error('email', 'id_card')  is-invalid @enderror"
                                                   name="login" type="text" placeholder="john@gmail.com" value="{{ old('email') }}" >
                                        </div>
                                        @error('email', 'id_card')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="g-mb-20">
                                        <label class="g-color-text-light-v1 g-font-weight-500">Password</label>
                                        <div class="input-group">
                                          <span class="input-group-prepend g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                            <div class="input-group-text justify-content-center w-100 g-bg-secondary g-brd-secondary-light-v2">
                                              <i class="icon-finance-135 u-line-icon-pro"></i>
                                            </div>
                                          </span>
                                            <input id="password" class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12 @error('password')  is-invalid @enderror"
                                                   name="password" type="password" placeholder="*********">
                                        </div>
                                        @error('password')
                                            <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        @if (Route::has('password.request'))
                                            <a class="g-color-text-light-v1 g-font-size-default" id="forgot-password-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        <button type="submit"
                                                class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-font-size-default rounded g-px-25 g-py-7">
                                            Signin
                                        </button>
                                    </div>
                                </div>

                                <div class="text-center g-pt-30">
                                    <p class="g-color-text-light-v1 g-font-size-default mb-0">Do not have an account?
                                        <a class="g-font-size-default" id="signup-link" href="{{ route('register') }}">Create
                                            Account</a></p>
                                </div>
                            </div>
                            <!-- End Signin -->
                        </form>
                        <!-- End Contact Form -->

                        <hr class="g-hidden-md-up g-my-60">
                    </div>

                    <div class="col-md-6 order-md-1">
                        <div class="g-max-width-400">
                            <!-- Media -->
                            <div class="media align-items-center g-mb-30">
                                <div class="d-flex mr-4">
                                  <span class="u-icon-v1 u-icon-size--lg u-shadow-v32 g-color-primary g-bg-secondary rounded-circle">
                                    <i class="material-icons">adb</i>
                                  </span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0">Watch out for sites or emails that <a href="#">pretend to be
                                            legitimate</a> and ask for your NetLink ID and password.</p>
                                </div>
                            </div>
                            <!-- End Media -->

                            <!-- Media -->
                            <div class="media align-items-center g-mb-30">
                                <div class="d-flex mr-4">
                      <span class="u-icon-v1 u-icon-size--lg u-shadow-v32 g-color-primary g-bg-secondary rounded-circle">
                        <i class="material-icons">bug_report</i>
                      </span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0"><a href="#">Report suspicious requests</a> for your NetLink ID and
                                        password.</p>
                                </div>
                            </div>
                            <!-- End Media -->

                            <!-- Media -->
                            <div class="media align-items-center">
                                <div class="d-flex mr-4">
                      <span class="u-icon-v1 u-icon-size--lg u-shadow-v32 g-color-primary g-bg-secondary rounded-circle">
                        <i class="material-icons">verified_user</i>
                      </span>
                                </div>
                                <div class="media-body">
                                    <p class="mb-0">Learn more about <a href="#">how to protect your account and
                                            computer</a>.</p>
                                </div>
                            </div>
                            <!-- End Media -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Signin Form -->
@stop
