<nav class="navbar navbar-expand-md navbar-light">
    @if(Request::url() !== route('frontend.user.dashboard'))
        <a href="{{ route('frontend.user.dashboard') }}" class="navbar-brand"><img src="{{ URL::asset('img/home-logo.png') }}" class="img-responsive img-rounded" style="max-width: 50px;" /></a>
    @endif

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse mt-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @guest

            @else
                @if(config('boilerplate.locale.status') && count(config('boilerplate.locale.languages')) > 1)
                    <li class="nav-item dropdown">
                        <x-utils.link
                            :text="__(getLocaleName(app()->getLocale()))"
                            class="nav-link dropdown-toggle"
                            id="navbarDropdownLanguageLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false" />

                        @include('includes.partials.lang')
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <x-utils.link
                        href="#"
                        id="navbarDropdown"
                        class="nav-link dropdown-toggle"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        v-pre
                    >
                        <x-slot name="text">
                            <img class="rounded-circle" style="max-height: 20px" src="{{ $logged_in_user->avatar }}" />
                            {{ $logged_in_user->{'name_'.app()->getLocale()} }} <span class="caret"></span>
                        </x-slot>
                    </x-utils.link>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if ($logged_in_user->isAdmin())
                            <x-utils.link
                                :href="route('admin.dashboard')"
                                :text="__('Administration')"
                                class="dropdown-item" />
                        @endif

                        @if ($logged_in_user->isUser())
                            <x-utils.link
                                :href="route('frontend.user.dashboard')"
                                :active="activeClass(Route::is('frontend.user.dashboard'))"
                                :text="__('Dashboard')"
                                class="dropdown-item"/>
                        @endif

                        <x-utils.link
                            :href="route('frontend.user.account')"
                            :active="activeClass(Route::is('frontend.user.account'))"
                            :text="__('My Account')"
                            class="dropdown-item" />

                        <x-utils.link
                            :text="__('Logout')"
                            class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <x-slot name="text">
                                @lang('Logout')
                                <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                            </x-slot>
                        </x-utils.link>
                    </div>
                </li>
            @endguest
        </ul>
    </div><!--navbar-collapse-->
</nav>

@if (config('boilerplate.frontend_breadcrumbs'))
    @include('frontend.includes.partials.breadcrumbs')
@endif
