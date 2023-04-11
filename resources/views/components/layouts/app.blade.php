<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ !empty($title) ? $title : config('app.name') }}</title>
    <x-partials.head />
</head>

<body dir="{{ direction() }}" data-kt-app-layout="dark-sidebar"
      data-kt-app-header-fixed="false" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true"
      data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true"
      data-kt-app-sidebar-push-toolbar="true"
      data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="false" data-kt-app-sidebar-minimize="on"
      class="app-default">

<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <x-preloader />

    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <div id="kt_app_header" class="app-header">
            <div class="app-container container-fluid d-flex align-items-stretch justify-content-between"
                 id="kt_app_header_container">
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                    <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                        <x-svg icon="bars" />
                    </div>
                </div>

                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                    <a href="#" class="d-lg-none">
                        <img alt="Logo" src="{{ asset('assets/media/logos/custom-2.svg') }}" class="h-30px" />
                    </a>
                </div>

                <div class="d-flex align-items-stretch justify-content-end flex-lg-grow-1">
                    <x-partials.user-menu />
                </div>
            </div>
        </div>
        <div class="app-wrapper flex-column flex-row-fluid">
            <x-sidebar.menu />

            <div class="app-main flex-column flex-row-fluid">
                <div class="d-flex flex-column flex-column-fluid">
                    <div class="app-content flex-column-fluid">
                        <div class="app-container container-fluid">
                            {{ $slot }}
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div id="kt_app_footer" class="app-footer">
                    <div
                        class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">
                                {{ now()->year }}
                                &copy;
                            </span>
                            <a href="#" class="text-gray-800 text-hover-primary">
                                {{ __('titles.AskAnswer') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <x-svg icon="arrow-top" />
</div>

<x-partials.scripts />
</body>
</html>
