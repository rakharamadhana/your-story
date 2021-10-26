@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <section class="vh-100 bg-main">
        @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            @include('frontend.auth.includes.language')
        @endif
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card shadow w3-animate-zoom" style="border-radius: 1rem; border: none;">
                        <div class="row g-0">
                            <div class="col-lg-7 d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                <img
                                    src="{{URL::asset('/img/login-form-bg.jpg')}}"
                                    alt="login form"
                                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                                />
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form method="post" action="{{ route('frontend.auth.login') }}">
                                        @csrf
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">@lang('Welcome!')</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">@lang('Sign into your account')</h5>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="email" class="form-control input_user" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="password" class="form-control input_pass" placeholder="{{ __('Password') }}" maxlength="100" required autocomplete="current-password" />

                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-group row ml-2">
                                            <div class="custom-control custom-checkbox">
                                                <input name="remember" id="remember" class="custom-control-input" type="checkbox" {{ old('remember') ? 'checked' : '' }} />

                                                <label class="custom-control-label" for="remember">
                                                    @lang('Remember Me')
                                                </label>
                                            </div><!--form-check-->
                                        </div>

                                        @if(config('boilerplate.access.captcha.login'))
                                            <div class="row">
                                                <div class="col">
                                                    @captcha
                                                    <input type="hidden" name="captcha_status" value="true" />
                                                </div><!--col-->
                                            </div><!--row-->
                                        @endif

                                        <div class="text-center">
                                            @include('frontend.auth.includes.social')
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">@lang('Login')</button>
                                        </div>

                                        <p><a href="{{ route('frontend.auth.password.request') }}" class="small text-muted">@lang('Forgot Your Password?')</a></p>

                                        <a href="#" class="small text-muted">@lang('Terms of use.')</a>
                                        <a href="#" class="small text-muted">@lang('Privacy policy.')</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
