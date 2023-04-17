<x-layouts.app>
    <div id="kt_app_content" class="app-content flex-column-fluid mt-0 pt-1">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="d-flex-end mb-5">
                <a href="{{ route('home') }}"
                   class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary me-2">
                    {{ __('actions.Reset') }}
                </a>

                <a href="javascript:void(0);" class="btn btn-sm btn-flex btn-primary fw-bold"
                   data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <x-svg icon="filter" />
                    {{ __('actions.Filter') }}
                </a>

                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true">
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">
                            {{ __('actions.Filter') }}
                        </div>
                    </div>

                    <div class="separator border-gray-200"></div>

                    <form class="px-7 py-5">
                        <div class="mb-10">
                            <label class="form-label fw-semibold" for="date_from">
                                {{ __('titles.DateFrom') }}:
                            </label>

                            <div class="d-flex">
                                <input
                                    type="date"
                                    id="date_from"
                                    name="date_from"
                                    class="form-control form-control-solid"
                                    value="{{ request('date_from') }}"
                                />
                            </div>
                        </div>

                        <div class="mb-10">
                            <label class="form-label fw-semibold" for="date_to">
                                {{ __('titles.DateTo') }}:
                            </label>

                            <div class="d-flex">
                                <input
                                    id="date_to"
                                    name="date_to"
                                    type="date"
                                    class="form-control form-control-solid"
                                    value="{{ request('date_to') }}"
                                />
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-secondary" data-kt-menu-dismiss="true">
                                {{ __('actions.Apply') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>


            <div class="row g-5 mb-5">
                <!--begin::Col-->
                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5"
                         style="background-color: #04acc4;">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">
                                    {{ number_format($all_active_users) }}
                                </span>

                                <span class="text-white opacity-75 pt-1 fw-semibold fs-6">
                                    {{ __('titles.ActiveUsers') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body d-flex align-items-end pt-0">
                            <div class="d-flex align-items-center flex-column mt-3 w-100">
                                <div
                                    class="d-flex justify-content-between fw-bold fs-6 text-white opacity-75 w-100 mt-auto mb-2">
                                    <span>{{ number_format($all_active_users) }} {{ __('titles.active') }}
                                        / {{ ($all_users ?: 1) }}</span>
                                    <span>
                                        {{ round(($all_active_users / ($all_users ?: 1)) * 100) }}%
                                    </span>
                                </div>

                                <div class="h-8px mx-3 w-100 bg-white bg-opacity-50 rounded">
                                    <div class="bg-white rounded h-8px" role="progressbar"
                                         style="width: {{ round(($all_active_users / ($all_users ?: 1)) * 100) }}%;"
                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-flush h-md-50 mb-5">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                        {{ number_format($answers) }}
                                    </span>
                                </div>

                                <span class="text-gray-400 pt-1 fw-semibold fs-6">
                                    {{ __('titles.Answers') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-column content-justify-center flex-row-fluid align-items-center">
                                <x-svg icon="check-list" class="svg-icon-5hx" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Col-->

                <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-md-5">
                    <div class="card card-flush h-md-50 mb-5">
                        <div class="card-header pt-5">
                            <div class="card-title d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                        {{ number_format($branches) }}
                                    </span>
                                </div>

                                <span class="text-gray-400 pt-1 fw-semibold fs-6">
                                    {{ __('titles.Branches') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body pt-2 pb-4 d-flex flex-wrap align-items-center">
                            <div class="d-flex flex-column content-justify-center flex-row-fluid align-items-center">
                                <x-svg icon="store" class="svg-icon-5hx" />
                            </div>
                        </div>
                    </div>

                    <div class="card card-flush h-md-50 mb-5">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">
                                    {{ number_format($users) }}
                                </span>
                                <!--end::Amount-->

                                <!--begin::Subtitle-->
                                <span class="text-gray-400 pt-1 fw-semibold fs-6">
                                    {{ __('titles.User') }}
                                </span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->

                        <!--begin::Card body-->
                        <div class="card-body d-flex-center">
                            <a href="javascript:void(0);"
                               class="border border-success border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3 me-lg-2 grow">
                                <!--begin::Number-->
                                <span class="fs-6 text-gray-700 fw-bold">
                                    <span class="ms-n1 counted">
                                        {{ number_format($users_workers) }}
                                    </span>
                                </span>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold text-gray-400">
                                    {{ __('titles.worker') }}
                                </div>
                                <!--end::Label-->
                            </a>
                            <a href="javascript:void(0);"
                               class="border border-danger border-dashed rounded min-w-100px w-100 py-2 px-4 mb-3 me-lg-2 grow">

                                <span class="fs-6 text-gray-700 fw-bold">
                                    <span class="ms-n1 counted">
                                        {{ number_format($users_consultants) }}
                                    </span>
                                </span>

                                <!--begin::Label-->
                                <div class="fw-semibold text-gray-400">
                                    {{ __('titles.consultant') }}
                                </div>
                                <!--end::Label-->
                            </a>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

                <div class="col-xxl-6">
                    <div class="card card-flush h-md-100">
                        <div class="card-header pt-5">
                            <h3 class="card-title text-gray-800 fw-bold">
                                {{ __('titles.Questions') }}
                            </h3>
                        </div>

                        <div class="card-body">
                            <div id="kt_apexcharts_1" style="height: 350px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Lists Widget 19-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Heading-->
                        <div
                            class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-250px"
                            style="background-image:url('{{ asset('assets/media/svg/shapes/top-green.png') }}')"
                            data-bs-theme="light">
                            <!--begin::Title-->
                            <div class="card-title align-items-start flex-column text-white pt-15">
                                <span class="fw-bold fs-2x mb-3">
                                    {{ __('titles.Questions') }}
                                </span>

                                <div class="fs-4 text-white">
                                    <span class="opacity-75">
                                        {{ number_format($open_questions + $resolved_questions + $closed_questions) }}
                                    </span>

                                    <span class="opacity-75">
                                        {{ __('titles.Questions') }}
                                    </span>
                                </div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->

                        <!--begin::Body-->
                        <div class="card-body mt-n20">
                            <div class="mt-n20 position-relative">
                                <div class="row g-3 g-lg-6">
                                    <div class="col-6">
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <div class="m-0">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1 min-h-70px grow">
                                                    {{ number_format($open_questions) }}
                                                </a>

                                                <span class="text-gray-500 fw-semibold fs-6">
                                                    {{ __('states.open') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <div class="m-0">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1 min-h-70px grow">
                                                    {{ number_format($resolved_questions) }}
                                                </a>

                                                <span class="text-gray-500 fw-semibold fs-6">
                                                    {{ __('states.resolved') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <div class="m-0">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1 min-h-70px grow">
                                                    {{ number_format($closed_questions) }}
                                                </a>

                                                <span class="text-gray-500 fw-semibold fs-6">
                                                    {{ __('states.closed') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5">
                                            <div class="m-0">
                                                <a href="javascript:void(0);"
                                                   class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1 min-h-70px grow">
                                                    {{ number_format($open_questions + $resolved_questions + $closed_questions) }}
                                                </a>

                                                <span class="text-gray-500 fw-semibold fs-6">
                                                    {{ __('titles.All') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card border-transparent h-xl-100 ps-xl-15">
                        <div class="card-body d-flex">
                            <div class="m-0">
                                <div class="position-relative fs-2x z-index-2 fw-bold mb-7">
                                    <span class="me-2">
                                        {{ __('titles.Top3Branches') }}
                                    </span>
                                </div>
                                <div id="top_branches_container">
                                    <canvas id="top_branches"></canvas>
                                </div>
                            </div>

                            <img src="{{ asset('assets/media/illustrations/dozzy-1/19.png') }}"
                                 class="position-absolute me-3 bottom-0 end-0 h-200px" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const element = document.getElementById('kt_apexcharts_1');
                const height = parseInt(KTUtil.css(element, 'height'));
                const labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
                const borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
                const openColor = KTUtil.getCssVariableValue('--bs-primary');
                const resolvedColor = KTUtil.getCssVariableValue('--bs-success');
                const closedColor = KTUtil.getCssVariableValue('--bs-danger');
                const questions = @json($questions);

                if (!!element) {
                    let open = arrayColumn(questions, 'open')
                    if (!Array.isArray(open) || !open.length) {
                        open = []
                    }

                    let resolved = arrayColumn(questions, 'resolved')
                    if (!Array.isArray(resolved) || !resolved.length) {
                        resolved = []
                    }

                    let closed = arrayColumn(questions, 'closed')
                    if (!Array.isArray(closed) || !closed.length) {
                        closed = []
                    }

                    const options = {
                        series: [
                            {name: '{{ __('states.open') }}', data: open},
                            {name: '{{ __('states.resolved') }}', data: resolved},
                            {name: '{{ __('states.closed') }}', data: closed},
                        ],
                        chart: {
                            type: 'bar',
                            height,
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: ['30%'],
                                endingShape: 'rounded'
                            },
                        },
                        dataLabels: {enabled: false},
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: arrayColumn(questions, 'month'),
                            axisTicks: {show: false},
                            labels: {style: {colors: labelColor, fontSize: '12px'}}
                        },
                        yaxis: {
                            axisBorder: {show: true},
                            labels: {style: {colors: labelColor, fontSize: '12px'}}
                        },
                        fill: {opacity: 1},
                        states: {
                            normal: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: false,
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: '12px'
                            },
                            y: {
                                formatter(val) {
                                    return val + ' {{ __('vehicles.meter_reading') }}'
                                }
                            }
                        },
                        colors: [openColor, resolvedColor, closedColor],
                        grid: {
                            borderColor: borderColor,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        }
                    };

                    new ApexCharts(element, options).render();
                }
            })

            document.addEventListener('DOMContentLoaded', () => {
                const ctx = document.getElementById('top_branches');
                const primaryColor = KTUtil.getCssVariableValue('--bs-primary');
                const dangerColor = KTUtil.getCssVariableValue('--bs-danger');
                const successColor = KTUtil.getCssVariableValue('--bs-success');
                const fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');
                const labels = arrayColumn(@json($top_branches), 'name');
                const top_branches = arrayColumn(@json($top_branches), 'users');

                const data = {
                    labels,
                    datasets: [{
                        backgroundColor: [primaryColor, dangerColor, successColor],
                        data: top_branches
                    },]
                };

                const config = {
                    type: 'pie',
                    data: data,
                    responsive: true,
                    maintainAspectRatio: true,
                    options: {
                        plugins: {
                            title: {
                                display: false,
                            },
                            legend: {
                                position: 'bottom'
                            },
                        },
                        responsive: true,
                    },
                    defaults: {
                        global: {
                            defaultFont: fontFamily
                        }
                    }
                };

                new Chart(ctx, config);
            })
        </script>
    @endpush
</x-layouts.app>
