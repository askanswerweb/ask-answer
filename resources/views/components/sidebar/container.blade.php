<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
     data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="end"
     data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <a href="#">
            <h2 class="text-light app-sidebar-logo-default">
                <span class="w-100 d-flex-start">
                    <img src="{{ asset('assets/media/logos/ask-dark.png') }}" width="35px" height="35px" alt="">
                    <span class="ms-lg-2">{{ __('titles.AskAnswer') }}</span>
                </span>
            </h2>
            <h2 class="text-light app-sidebar-logo-minimize">
                <img src="{{ asset('assets/media/logos/ask-dark.png') }}" width="35px" height="35px" alt="Sibawayh">
            </h2>
        </a>

        <div id="kt_app_sidebar_toggle"
             class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <x-svg icon="angle-double-left" class="rotate-180" />
        </div>
    </div>

    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
             data-kt-scroll-save-state="true">
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">

                {{ $slot }}

            </div>
        </div>
    </div>

    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
        <button
            type="submit"
            form="sidebar_logout"
            class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100">
            <span class="btn-label">{{ __('auth.Signout') }}</span>
            <x-svg icon="sign-out" class="btn-icon m-0" />
        </button>

        <form action="{{ route('logout') }}" method="POST" id="sidebar_logout">
            @csrf
        </form>
    </div>
</div>
