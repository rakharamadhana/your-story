<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ appName() }}</title>
        <meta name="description" content="@yield('meta_description', appName())">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        @stack('before-styles')
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ mix('css/frontend.css') }}" rel="stylesheet">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
        </style>
        @stack('after-styles')
    </head>
    <body class="vh-100 bg-main">
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        @include('includes.partials.announcements')
        @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
            @include('frontend.auth.includes.language')
        @endif

        <div id="app" class="flex-center position-ref full-height">

            <div class="content fade-in-anim">
                @include('includes.partials.messages')

                <div class="title">
                    @lang('Social Emotion Learning')
                </div><!--title-->

                <div class="links">
                    @auth
                        @if ($logged_in_user->isUser())
                            <a href="{{ route('frontend.user.dashboard') }}">@lang('Dashboard')</a>
                        @endif

                        @if ($logged_in_user->isAdmin())
                            <a href="{{ route('admin.dashboard') }}">@lang('Dashboard')</a>
                        @endif

                        <a href="{{ route('frontend.user.account') }}">@lang('Account')</a>
                    @else
                        <a href="{{ route('frontend.auth.login') }}">@lang('Login')</a>

                        @if (config('boilerplate.access.user.registration'))
                            <a href="{{ route('frontend.auth.register') }}">@lang('Register')</a>
                        @endif
                    @endauth
                </div><!--links-->
            </div><!--content-->
        </div><!--app-->

        @stack('before-scripts')
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/frontend.js') }}"></script>
        @stack('after-scripts')
    </body>
</html>
