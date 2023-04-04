<div class="app-navbar flex-shrink-0">
    <div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
             data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
             data-kt-menu-placement="{{ is_arabic() ? 'bottom-start' : 'bottom-end'}}">
            <x-widgets.user-logo :user="auth()->user()" class="symbol-circle" />
        </div>

        <div
            class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
            data-kt-menu="true">
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <x-widgets.user-logo :user="auth()->user()" class="symbol-circle me-3" />
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">
                            {{ auth()->user()->name }}
                        </div>
                        <label class="fw-semibold text-muted text-hover-primary fs-7">
                            {{ auth()->user()->username }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="separator my-2"></div>
            <div class="menu-item px-5">
                <a href="{{ route('home') }}" class="menu-link px-5 {{ request()->routeIs('home') ? 'active' : '' }}">
                    {{ __('titles.Dashboard') }}
                </a>
            </div>

            <div class="separator my-2"></div>

            <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                 data-kt-menu-placement="left-start">
                <a href="#" class="menu-link px-5">
                    <label class="menu-title position-relative">
                        {{ __('titles.Language') }}
                        <label
                            class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                            {{ current_locale_native() }}
                            <img class="w-15px h-15px rounded-1 ms-2"
                                 src="{{ asset('assets/media/flags/' . current_locale_flag()) }}"
                                 alt="{{ current_locale_native() }}"
                                 loading="lazy"
                            />
                        </label>
                    </label>
                </a>
                <div class="menu-sub menu-sub-dropdown w-175px py-4">
                    @foreach (locales() as $key => $locale)
                        <div class="menu-item px-3 user-select-none">
                            <a href="{{ locale_url($key) }}"
                               class="menu-link d-flex px-5 @if (app()->getLocale() == $key) active btn disabled @endif">
                                <labl class="symbol symbol-20px me-4">
                                    <img class="rounded-1"
                                         src="{{ asset('assets/media/flags/' . $locale['flag']) }}"
                                         alt="{{ $locale['native'] }}"
                                         loading="lazy"
                                    />
                                </labl>
                                {{ $locale['native'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Logout -->
            <div class="menu-item px-5">
                <button type="submit" class="btn w-100 menu-link px-5" form="logout">
                    {{ __('auth.Signout') }}
                </button>

                <form action="{{ route('logout') }}" method="POST" id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
