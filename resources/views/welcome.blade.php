<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name')  }}</title>
    <x-partials.head />
</head>

<body id="kt_body" dir="{{ direction() }}" data-bs-spy="scroll" data-bs-target="#kt_landing_menu"
      class="bg-white position-relative app-blank">

<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="mb-0" id="home">
        <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
             style="background-image: url('{{ asset('assets/media/svg/illustrations/landing.svg') }}')">
            <div class="landing-header"
                 data-kt-sticky="true"
                 data-kt-sticky-name="landing-header"
                 data-kt-sticky-offset="{default: '200px', lg: '300px'}">

                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-equal">
                            <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none"
                                    id="kt_landing_menu_toggle">
                                <i class="ki-duotone ki-abstract-14 fs-2hx">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>

                            <a href="{{ route('welcome') }}">
                                <img alt="Logo" src="/assets/media/logos/landing.svg"
                                     class="logo-default h-25px h-lg-30px" />
                                <img alt="Logo" src="/assets/media/logos/landing-dark.svg"
                                     class="logo-sticky h-20px h-lg-25px" />
                            </a>
                        </div>

                        <div class="d-lg-block" id="kt_header_nav_wrapper">
                            <div
                                class="d-lg-block p-5 p-lg-0"

                                data-kt-drawer="true"
                                data-kt-drawer-name="landing-menu"
                                data-kt-drawer-activate="{default: true, lg: false}"
                                data-kt-drawer-overlay="true"
                                data-kt-drawer-width="200px"
                                data-kt-drawer-direction="start"
                                data-kt-drawer-toggle="#kt_landing_menu_toggle"

                                data-kt-swapper="true"
                                data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

                                <div
                                    class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-semibold"
                                    id="kt_landing_menu">
                                    <div class="menu-item">
                                        <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body"
                                           data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            {{ __('titles.Home') }}
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#how-it-works"
                                           data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            {{ __('titles.HowItWorks') }}
                                        </a>
                                    </div>

                                    <div class="menu-item">
                                        <a class="menu-link nav-link  py-3 px-4 px-xxl-6" href="#statistics"
                                           data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">
                                            {{ __('titles.Statistics') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-equal text-end ms-1">
                            <a href="{{ route('login') }}" class="btn btn-success">
                                {{ __('auth.Signin') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                <div class="text-center mb-5 mb-lg-10 py-10 py-lg-20">
                    <h1 class="text-white lh-base fw-bold fs-2x fs-lg-3x mb-15">
                        {{ __('titles.MainPageHeader') }}<br />
                        {{ __('titles.With') }}

                        <span
                            style="background: linear-gradient(to right, #12CE5D 0%, #FFD80C 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                            <span id="kt_landing_hero_text">{{ __('titles.AskAnswer') }}</span>
                        </span>
                    </h1>

                    <a href="{{ route('register') }}" class="btn btn-primary">
                        {{ __('titles.GetStarted') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
            <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                    fill="currentColor"></path>
            </svg>
        </div>
    </div>

    <div class="mb-n10 mb-lg-n20 z-index-2">
        <div class="container">
            <div class="text-center mb-17">
                <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">How
                    it Works</h3>

                <div class="fs-5 text-muted fw-bold">
                    {{ __('titles.SaveCost') }} <br />
                    {{ __('titles.AmazingUsefulAdmin') }}
                </div>
            </div>

            <div class="row w-100 gy-10 mb-md-20">
                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/2.png') }}" class="mh-125px mb-9"
                             alt="" />
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">1</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">
                                {{ __('auth.Signup') }}
                            </div>
                        </div>

                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                            {{ __('titles.StartAccount') }} <br />
                            {{ __('titles.EnterYouData') }} <br />
                            {{ __('titles.PressSignup') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/8.png') }}" class="mh-125px mb-9"
                             alt="" />
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">2</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">
                                {{ __('titles.StartAsking') }}
                            </div>
                        </div>

                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                            {{ __('titles.StartAskingAndUpload') }} <br />
                            {{ __('titles.WaitToTheAnswer') }} <br />
                            {{ __('titles.GetAnswered') }}
                        </div>
                    </div>
                </div>

                <div class="col-md-4 px-5">
                    <div class="text-center mb-10 mb-md-0">
                        <img src="{{ asset('assets/media/illustrations/sketchy-1/12.png') }}" class="mh-125px mb-9"
                             alt="" />
                        <div class="d-flex flex-center mb-5">
                            <span class="badge badge-circle badge-light-success fw-bold p-5 me-3 fs-3">3</span>
                            <div class="fs-5 fs-lg-3 fw-bold text-dark">{{ __('titles.EnjoyAskingApp') }}</div>
                        </div>

                        <div class="fw-semibold fs-6 fs-lg-4 text-muted">
                            {{ __('titles.GetListQuestions') }} <br />
                            {{ __('titles.GetAnswers') }} <br />
                            {{ __('titles.EnjoyNow') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-sm-n10">
        <div class="pb-15 pt-18">
            <div class="container border border-4 border-dashed shadow-sm rounded-4">
                <div class="text-center mt-15 mb-18" id="statistics" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <h3 class="fs-2hx fw-bold mb-5">
                        {{ __('titles.WeMakeThingsBetter') }}
                    </h3>

                    <!--begin::Description-->
                    <div class="fs-5 text-gray-700 fw-bold">
                        Save thousands to millions of bucks by using single tool <br />
                        for different amazing and great useful admin
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->

                <div class="d-flex flex-center">
                    <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                        <div
                            class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets/media/svg/misc/smartphone-2-dark.svg') }}')">
                            <div class="mb-0">
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true"
                                         data-kt-countup-value="{{ $questions }}">0
                                    </div>
                                </div>

                                <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                    {{ __('titles.Questions') }}
                                </span>
                            </div>
                        </div>

                        <div
                            class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets/media/svg/misc/smartphone-2-dark.svg') }}')">
                            <div class="mb-0">
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true"
                                         data-kt-countup-value="{{ $answers }}">0
                                    </div>
                                </div>

                                <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                    {{ __('titles.Answers') }}
                                </span>
                            </div>
                        </div>

                        <div
                            class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain"
                            style="background-image: url('{{ asset('assets/media/svg/misc/smartphone-2-dark.svg') }}')">
                            <div class="mb-0">
                                <div class="fs-lg-2hx fs-2x fw-bold text-white d-flex flex-center">
                                    <div class="min-w-70px" data-kt-countup="true"
                                         data-kt-countup-value="{{ $branches }}">0
                                    </div>
                                </div>

                                <span class="text-gray-600 fw-semibold fs-5 lh-0">
                                    {{ __('titles.Branches') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
    </div>

    <div id="kt_app_footer" class="app-footer">
        <div
            class="app-container container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 landing-dark-bg">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">
                    {{ now()->year }}
                    &copy;
                </span>
                <a href="javascript:void(0);" class="text-white">
                    {{ __('titles.AskAnswer') }}
                </a>
            </div>
        </div>
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <x-svg icon="arrow-top" />
    </div>
</div>


<x-partials.scripts />
<script src="{{ asset('assets/js/custom/landing.js') }}"></script>
</body>
</html>
