<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('Toggle navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-0" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

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

        </ul>
    </div>
</nav>
