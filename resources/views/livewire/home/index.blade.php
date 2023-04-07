<section>
    <div id="kt_app_toolbar" class="app-toolbar container-fluid py-3 py-lg-6">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                    {{ __('titles.OpenQuestions') }}
                </h1>
            </div>

            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <!--begin::Filter menu-->
                <div class="m-0">
                    <!--begin::Menu toggle-->
                    <a href="#"
                       class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold"
                       data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-filter fs-6 text-muted me-1"><span
                                class="path1"></span><span class="path2"></span></i>
                        Filter
                    </a>
                    <!--end::Menu toggle-->


                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                         id="kt_menu_642b6d0cf0ae3">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div>
                        <!--end::Header-->

                        <!--begin::Menu separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Menu separator-->

                        <!--begin::Form-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Status:</label>
                                <!--end::Label-->

                                <!--begin::Input-->
                                <div>
                                    <select class="form-select form-select-solid" data-kt-select2="true"
                                            data-placeholder="Select option"
                                            data-dropdown-parent="#kt_menu_642b6d0cf0ae3"
                                            data-allow-clear="true">
                                        <option></option>
                                        <option value="1">Approved</option>
                                        <option value="2">Pending</option>
                                        <option value="2">In Process</option>
                                        <option value="2">Rejected</option>
                                    </select>
                                </div>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Member Type:</label>
                                <!--end::Label-->

                                <!--begin::Options-->
                                <div class="d-flex">
                                    <!--begin::Options-->
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                        <span class="form-check-label">
                                            Author
                                        </span>
                                    </label>
                                    <!--end::Options-->

                                    <!--begin::Options-->
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="2"
                                               checked="checked" />
                                        <span class="form-check-label">
                                            Customer
                                        </span>
                                    </label>
                                    <!--end::Options-->
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fw-semibold">Notifications:</label>
                                <!--end::Label-->

                                <!--begin::Switch-->
                                <div
                                    class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value=""
                                           name="notifications" checked />
                                    <label class="form-check-label">
                                        Enabled
                                    </label>
                                </div>
                                <!--end::Switch-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset"
                                        class="btn btn-sm btn-light btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset
                                </button>

                                <button type="submit" class="btn btn-sm btn-primary"
                                        data-kt-menu-dismiss="true">Apply
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Form-->
                    </div>
                    <!--end::Menu 1-->        </div>
                <!--end::Filter menu-->


                <!--begin::Secondary button-->
                <!--end::Secondary button-->

                <!--begin::Primary button-->
                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                   data-bs-target="#kt_modal_create_app">
                    Create </a>
                <!--end::Primary button-->
            </div>
        </div>
    </div>

    <div id="kt_app_content_container" class="container-fluid">
        <div class="d-flex flex-row">
            <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px"
                 data-kt-drawer="true"
                 data-kt-drawer-name="start-sidebar"
                 data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true"
                 data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                 data-kt-drawer-direction="start"
                 data-kt-drawer-toggle="#kt_social_start_sidebar_toggle"
            >


                <!--begin::User menu-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Body-->
                    <div class="card-body pt-15 px-0">
                        <!--begin::Member-->
                        <div class="d-flex flex-column text-center mb-9 px-9">
                            <!--begin::Photo-->
                            <div class="symbol symbol-80px symbol-lg-150px mb-4">
                                <x-widgets.user-logo :user="auth()->user()" class="fs-1" />
                                {{--                                <img src="/assets/media/avatars/300-3.jpg" class="" alt="" />--}}
                            </div>
                            <!--end::Photo-->

                            <!--begin::Info-->
                            <div class="text-center">
                                <!--begin::Name-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="text-gray-800 fw-bold text-hover-primary fs-4">Jerry Kane</a>
                                <!--end::Name-->

                                <!--begin::Position-->
                                <span class="text-muted d-block fw-semibold">Grade 8, AE3 Student</span>
                                <!--end::Position-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Member-->

                        <!--begin::Row-->
                        <div class="row px-9 mb-4">
                            <!--begin::Col-->
                            <div class="col-md-4 text-center">
                                <div class="text-gray-800 fw-bold fs-3">
                                    <span class="m-0" data-kt-countup="true"
                                          data-kt-countup-value="642">0</span>
                                </div>

                                <span class="text-gray-500 fs-8 d-block fw-bold">POSTS</span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 text-center">
                                <div class="text-gray-800 fw-bold fs-3">
                                    <span class="m-0" data-kt-countup="true" data-kt-countup-value="24">0</span>
                                    K
                                </div>

                                <span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWERS</span>
                            </div>
                            <!--end::Col-->

                            <!--begin::Col-->
                            <div class="col-md-4 text-center">
                                <div class="text-gray-800 fw-bold fs-3">
                                    <span class="m-0" data-kt-countup="true" data-kt-countup-value="12">0</span>
                                    K
                                </div>

                                <span class="text-gray-500 fs-8 d-block fw-bold">FOLLOWING</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

                        <!--begin::Navbar-->
                        <div class="m-0">
                            <!--begin::Navs-->
                            <ul class="nav nav-pills nav-pills-custom flex-column border-transparent fs-5 fw-bold">
                                <!--begin::Nav item-->
                                <li class="nav-item mt-5">
                                    <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 active"
                                       href="/metronic8/demo1/../demo1/pages/social/feeds.html">
                                        <i class="ki-duotone ki-row-horizontal fs-3 text-muted me-3"><span
                                                class="path1"></span><span class="path2"></span></i>

                                        Feeds
                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                        <!--end::Bullet-->
                                    </a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-5">
                                    <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 "
                                       href="/metronic8/demo1/../demo1/pages/social/activity.html">
                                        <i class="ki-duotone ki-chart-simple-2 fs-3 text-muted me-3"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span><span class="path4"></span></i>

                                        Activity
                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                        <!--end::Bullet-->
                                    </a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-5">
                                    <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 "
                                       href="/metronic8/demo1/../demo1/pages/social/followers.html">
                                        <i class="ki-duotone ki-profile-circle fs-3 text-muted me-3"><span
                                                class="path1"></span><span class="path2"></span><span
                                                class="path3"></span></i>

                                        Followers
                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                        <!--end::Bullet-->
                                    </a>
                                </li>
                                <!--end::Nav item-->
                                <!--begin::Nav item-->
                                <li class="nav-item mt-5">
                                    <a class="nav-link text-muted text-active-primary ms-0 py-0 me-10 ps-9 border-0 "
                                       href="/metronic8/demo1/../demo1/pages/social/settings.html">
                                        <i class="ki-duotone ki-setting-2 fs-3 text-muted me-3"><span
                                                class="path1"></span><span class="path2"></span></i>

                                        Settings
                                        <!--begin::Bullet-->
                                        <span
                                            class="bullet-custom position-absolute start-0 top-0 w-3px h-100 bg-primary rounded-end"></span>
                                        <!--end::Bullet-->
                                    </a>
                                </li>
                                <!--end::Nav item-->
                            </ul>
                            <!--begin::Navs-->
                        </div>
                        <!--end::Navbar-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::User menu-->
                <!--begin::List widget 14-->
                <div class="card card-flush ">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Timeline</span>
                            <span class="text-gray-400 pt-2 fw-semibold fs-6">Latest activities</span>
                        </h3>
                        <!--end::Title-->

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button
                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">
                                <i class="ki-duotone ki-dots-square fs-1 text-gray-300 me-n1"><span
                                        class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i>
                            </button>


                            <!--begin::Menu 2-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                        Actions
                                    </div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        {{ __('actions.Preview') }}
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Customer
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                     data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->

                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Admin Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Staff Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Member Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Contact
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                            Generate Reports
                                        </a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-6">
                        <!--begin::Timeline-->
                        <div class="timeline-label">
                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">08:42</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Text-->
                                <div class="fw-semibold text-gray-700 ps-3 fs-7">
                                    Outlines keep you honest. Indulging in poorly driving and keep
                                    structure
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item d-flex align-items-center">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">10:00</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Content-->
                                <div class="d-flex align-items-center">
                                    <span class="fw-bold text-gray-800 px-3">AEOL meeting with</span>

                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px me-3">
                                        <img src="/assets/media/avatars/300-1.jpg" alt="" />
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px">
                                        <img src="/assets/media/avatars/300-2.jpg" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">14:37</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Desc-->
                                <div class="timeline-content fw-bold text-gray-800 ps-3">
                                    Make deposit
                                    <a href="#" class="text-primary">USD 700</a>.
                                    to ESL
                                </div>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Text-->
                                <div class="fw-semibold text-gray-700 ps-3 fs-7">
                                    Outlines keep you honest. Indulging in poorly driving and keep
                                    structure keep you honest great
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">21:03</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Desc-->
                                <div class="timeline-content fw-semibold text-gray-800 ps-3">
                                    New order placed <a href="#" class="text-primary">#XF-2356</a>.
                                </div>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">16:50</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Text-->
                                <div class="fw-semibold text-gray-700 ps-3 fs-7">
                                    Outlines keep you honest. Indulging in poorly driving and keep
                                    structure
                                </div>
                                <!--end::Text-->
                            </div>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <div class="timeline-item">
                                <!--begin::Label-->
                                <div class="timeline-label fw-bold text-gray-800 fs-6">14:37</div>
                                <!--end::Label-->

                                <!--begin::Badge-->
                                <div class="timeline-badge">
                                    <i class="ki-duotone ki-abstract-8 text-gray-600 fs-3"><span
                                            class="path1"></span><span class="path2"></span></i>
                                </div>
                                <!--end::Badge-->

                                <!--begin::Desc-->
                                <div class="timeline-content fw-bold text-gray-800 ps-3">
                                    Make deposit
                                    <a href="#" class="text-primary">USD 700</a>.
                                    to ESL
                                </div>
                                <!--end::Desc-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Timeline-->
                    </div>
                    <!--end: Card Body-->
                </div>
                <!--end: List widget 14-->
            </div>

            <div class="w-100 flex-lg-row-fluid mx-lg-5">
                <div class="d-flex d-lg-none align-items-center justify-content-end mb-10">
                    <div class="d-flex align-items-center gap-2">
                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                             id="kt_social_start_sidebar_toggle">
                            <i class="ki-duotone ki-profile-circle fs-1"><span
                                    class="path1"></span><span class="path2"></span><span
                                    class="path3"></span></i></div>

                        <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                             id="kt_social_end_sidebar_toggle">
                            <i class="ki-duotone ki-scroll fs-1"><span class="path1"></span><span
                                    class="path2"></span><span class="path3"></span></i></div>
                    </div>
                </div>

                <div class="mb-10" id="kt_social_feeds_posts">
                    @foreach($list as $item)
                        @livewire('home.index-item', ['question' => $item], key(microtime()))
                    @endforeach
                </div>

                <div class="d-flex flex-center">
                    {!! $list->links() !!}
                </div>
            </div>

            <div class="d-lg-flex flex-column flex-lg-row-auto w-lg-325px"
                 data-kt-drawer="true"
                 data-kt-drawer-name="end-sidebar"
                 data-kt-drawer-activate="{default: true, lg: false}"
                 data-kt-drawer-overlay="true"
                 data-kt-drawer-width="{default:'200px', '250px': '300px'}"
                 data-kt-drawer-direction="end"
                 data-kt-drawer-toggle="#kt_social_end_sidebar_toggle"
            >

                <!--begin::Social widget 1-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Suggestions for you</span>

                            <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                        </h3>

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Menu-->
                            <button
                                class="btn btn-icon btn-color-gray-400 btn-active-color-primary justify-content-end"
                                data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end"
                                data-kt-menu-overflow="true">

                                <i class="ki-duotone ki-dots-square fs-1"><span
                                        class="path1"></span><span class="path2"></span><span
                                        class="path3"></span><span class="path4"></span></i>
                            </button>

                            <!--begin::Menu 2-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">Quick
                                        Actions
                                    </div>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        {{ __('actions.Preview') }}
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Customer
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover"
                                     data-kt-menu-placement="right-start">
                                    <!--begin::Menu item-->
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">New Group</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--end::Menu item-->

                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Admin Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Staff Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->

                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">
                                                Member Group
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">
                                        New Contact
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu separator-->
                                <div class="separator mt-3 opacity-75"></div>
                                <!--end::Menu separator-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content px-3 py-3">
                                        <a class="btn btn-primary  btn-sm px-4" href="#">
                                            Generate Reports
                                        </a>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->

                            <!--end::Menu-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-11.jpg"
                                     class="h-50 align-self-center" alt="" />
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                       class="text-gray-800 text-hover-primary fs-6 fw-bold">Jacob
                                        Jones</a>

                                    <span class="text-muted fw-semibold d-block fs-7">Barone LLC.</span>
                                </div>
                                <!--end:Author-->

                                <!--begin:Action-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                                <!--end:Action-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-2.jpg"
                                     class="h-50 align-self-center" alt="" />
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                       class="text-gray-800 text-hover-primary fs-6 fw-bold">Annette
                                        Black</a>

                                    <span class="text-muted fw-semibold d-block fs-7">Binford
                                        Ltd.</span>
                                </div>
                                <!--end:Author-->

                                <!--begin:Action-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                                <!--end:Action-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-7.jpg"
                                     class="h-50 align-self-center" alt="" />
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                       class="text-gray-800 text-hover-primary fs-6 fw-bold">Devon
                                        Lane</a>

                                    <span class="text-muted fw-semibold d-block fs-7">Acme Co.</span>
                                </div>
                                <!--end:Author-->

                                <!--begin:Action-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                                <!--end:Action-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-9.jpg"
                                     class="h-50 align-self-center" alt="" />
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                       class="text-gray-800 text-hover-primary fs-6 fw-bold">Kristin
                                        Watson</a>

                                    <span class="text-muted fw-semibold d-block fs-7">Biffco Enterprises
                                        Ltd.</span>
                                </div>
                                <!--end:Author-->

                                <!--begin:Action-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                                <!--end:Action-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-4"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-40px me-5">
                                <img src="/assets/media/avatars/300-12.jpg"
                                     class="h-50 align-self-center" alt="" />
                            </div>
                            <!--end::Symbol-->

                            <!--begin::Section-->
                            <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                                <!--begin:Author-->
                                <div class="flex-grow-1 me-2">
                                    <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                       class="text-gray-800 text-hover-primary fs-6 fw-bold">Eleanor
                                        Pena</a>

                                    <span class="text-muted fw-semibold d-block fs-7">Abstergo
                                        Ltd.</span>
                                </div>
                                <!--end:Author-->

                                <!--begin:Action-->
                                <a href="/metronic8/demo1/../demo1/pages/user-profile/overview.html"
                                   class="btn btn-sm btn-light fs-8 fw-bold">Follow</a>
                                <!--end:Action-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Item-->


                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Social widget 1-->


                <!--begin::Social widget 2-->
                <div class="card card-flush mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-dark">Trending Feeds</span>

                            <span class="text-muted mt-1 fw-semibold fs-7">8k social visitors</span>
                        </h3>

                        <!--begin::Toolbar-->
                        <div class="card-toolbar">
                            <a href="/metronic8/demo1/../demo1/pages/social/activity.html"
                               class="btn btn-sm btn-light">View All</a>
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Img-->
                                <a href="">
                                    <img src="/assets/media/stock/600x600/img-33.jpg"
                                         class="rounded w-100" alt="" />
                                </a>
                                <!--end::Img-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Img-->
                                <a href="">
                                    <img src="/assets/media/stock/600x600/img-26.jpg"
                                         class="rounded w-100" alt="" />
                                </a>
                                <!--end::Img-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Img-->
                                <a href="">
                                    <img src="/assets/media/stock/600x600/img-25.jpg"
                                         class="rounded w-100" alt="" />
                                </a>
                                <!--end::Img-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-md-6">
                                <!--begin::Img-->
                                <a href="">
                                    <img src="/assets/media/stock/600x600/img-35.jpg"
                                         class="rounded w-100" alt="" />
                                </a>
                                <!--end::Img-->
                            </div>
                            <!--end::Col-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Social widget 2-->
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/widgets.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/chat/chat.js') }}"></script>
        <script src="{{ asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
    @endpush
</section>
