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
                            <h2 class="h1 mb-3">Sign in to Unify</h2>
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
                        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Signup -->
                        <div id="signup">
                            <div class="u-shadow-v35 g-bg-white rounded g-px-40 g-py-50">

                                <div class="g-mb-20">
                                    <label class="g-color-text-light-v1 g-font-weight-500">Name</label>
                                    <div class="input-group ">
                                      <span class="input-group-prepend g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                        <div class="input-group-text justify-content-center w-100 g-bg-secondary g-brd-secondary-light-v2">
                                          <i class="icon-education-083 u-line-icon-pro"></i>
                                        </div>
                                      </span>
                                        <input id="name" class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12 @error('name') is-invalid @enderror"
                                               name="name" type="text" placeholder="john">
                                    </div>
                                    @error('name')
                                    <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="g-mb-20">
                                    <label class="g-color-text-light-v1 g-font-weight-500">Email</label>
                                    <div class="input-group ">
                                      <span class="input-group-prepend g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                        <div class="input-group-text justify-content-center w-100 g-bg-secondary g-brd-secondary-light-v2">
                                          <i class="icon-education-166 u-line-icon-pro"></i>
                                        </div>
                                      </span>
                                        <input id="email" class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12 @error('email') is-invalid @enderror"
                                               name="email" type="email" placeholder="john@gmail.com">
                                    </div>
                                    @error('email')
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
                                        <input id="password"  class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12"
                                               name="password" type="password" placeholder="*********">
                                    </div>
                                    @error('password')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="g-mb-20">
                                    <label class="g-color-text-light-v1 g-font-weight-500">Confirm Password</label>
                                    <div class="input-group">
                                      <span class="input-group-prepend g-width-50 g-brd-secondary-light-v2 g-bg-secondary g-rounded-right-0">
                                        <div class="input-group-text justify-content-center w-100 g-bg-secondary g-brd-secondary-light-v2">
                                          <i class="icon-real-estate-056 u-line-icon-pro"></i>
                                        </div>
                                      </span>
                                        <input id="password-confirm" class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-left-0 g-px-20 g-py-12"
                                               name="password_confirmation" type="password" placeholder="*********" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <button type="submit"
                                            class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-font-size-default rounded g-px-25 g-py-7 ml-auto">
                                        Signup
                                    </button>
                                </div>
                            </div>

                            <div class="text-center g-pt-30">
                                <p class="g-color-text-light-v1 g-font-size-default mb-0">Already have an account?
                                    <a class="g-font-size-default" id="signin-link" href="{{route('login')}}">Signin</a></p>
                            </div>
                        </div>
                        <!-- End Signup -->

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
