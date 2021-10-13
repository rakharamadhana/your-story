@extends('frontend.layouts.app')

@section('title', __('Login'))

@section('content')
    <div class="container h-100 w-100">
        <div class="d-flex justify-content-center h-100">
			<div class="user_card w3-animate-top">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="https://cdn.freebiesupply.com/images/large/2x/medium-logo-on-dark-blue.png" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
                    <x-forms.post :action="route('frontend.auth.login')">
                        
                        <!-- Email Address -->
                        <div class="input-group mb-3">  
                            <div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>

                            <input type="email" name="email" id="email" class="form-control input_user" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') }}" maxlength="255" required autofocus autocomplete="email" />
                        </div>
                        
                        <!-- Password -->
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>

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

                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <button class="btn login_btn" type="submit">@lang('Login')</button>

                                <a href="route('frontend.auth.password.request')" class="link_small">Forgot your Password</a>
                            </div>
                        </div><!--form-group-->

                        <div class="text-center">
                            @include('frontend.auth.includes.social')
                        </div>
                    </x-forms.post>
				</div>
			</div>
		</div>
    </div><!--container-->
@endsection
