@php /** @var \App\Models\Question $question */ @endphp
<div class="card card-flush mb-5">
    <div class="card-header pt-9">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-50px me-5">
                <x-widgets.user-logo :user="$question->user" />
            </div>

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Name-->
                <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                    {{ $question->user->name }}
                </a>
                <!--end::Name-->

                <!--begin::Date-->
                <span class="text-gray-400 fw-semibold d-block">
                    {{ $question->getCreatedAtForHumans() }}
                </span>
                <!--end::Date-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Author-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Menu wrapper-->
            <div class="m-0">
                <!--begin::Menu toggle-->
                <button
                    class="btn btn-icon btn-color-gray-400 btn-active-color-primary me-n4"
                    data-kt-menu-trigger="click"
                    data-kt-menu-placement="bottom-end"
                    data-kt-menu-overflow="true">

                    <x-svg icon="dots-h-three" />
                </button>


                <div
                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px"
                    data-kt-menu="true">
                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                            Quick Actions
                        </div>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu separator-->
                    <div class="separator mb-3 opacity-75"></div>
                    <!--end::Menu separator-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="{{ route('questions.preview', ['question' => $question->id]) }}" class="menu-link px-3">
                            {{ __('actions.Preview') }}
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3">
                        <a href="javascript:void(0);" class="menu-link px-3">
                            New Customer
                        </a>
                    </div>
                    <!--end::Menu item-->

                    <!--begin::Menu item-->
                    <div class="menu-item px-3" data-kt-menu-trigger="hover"
                         data-kt-menu-placement="right-start">
                        <!--begin::Menu item-->
                        <a href="javascript:void(0);" class="menu-link px-3">
                            <span class="menu-title">New Group</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <!--end::Menu item-->

                        <!--begin::Menu sub-->
                        <div class="menu-sub menu-sub-dropdown w-175px py-4">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="javascript:void(0);" class="menu-link px-3">
                                    Admin Group
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="javascript:void(0);" class="menu-link px-3">
                                    Staff Group
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="javascript:void(0);" class="menu-link px-3">
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
                        <a href="javascript:void(0);" class="menu-link px-3">
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
                            <button class="btn btn-danger w-100 btn-sm px-4" data-bs-toggle="modal"
                                    data-bs-target="#delete_{{ $question->id }}">
                                {{ __('actions.Delete') }}
                            </button>
                        </div>
                    </div>
                    <!--end::Menu item-->
                </div>
            </div>
        </div>

        <x-widgets.modal id="delete_{{ $question->id }}" :title="__('actions.Delete')" :subtitle="$question->title">
            <div class="w-100 text-center">
                <h4>{{ __('actions.ConfirmDelete') }}</h4>
                <div class="text-muted fw-semibold fs-5">
                    {{ __('titles.CantRevert') }}
                </div>
            </div>

            <x-slot name="footer">
                <button class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('actions.Cancel') }}
                </button>
                <button class="btn btn-danger" wire:click="delete" data-bs-dismiss="modal">
                    {{ __('actions.Delete') }}
                </button>
            </x-slot>
        </x-widgets.modal>
    </div>

    <div class="card-body">
        <h2>{{ $question->id }} - {{ $question->title }}</h2>
        <!--begin::Post content-->
        <div class="fs-6 fw-normal text-gray-700 mt-0 mb-5 pre-wrap">
            {!! $question->description !!}
        </div>
        <!--end::Post content-->

        @if($question->images->isNotEmpty())
            <div class="row g-7 h-250px h-md-375px">

                @if($first_media = $question->images->first())
                    @php /** @var \App\Models\Media $first_media */ @endphp

                    <div class="col-6">
                        <!--begin::Item-->
                        <a class="d-block card-rounded overlay h-100"
                           data-fslightbox="lightbox-projects"
                           href="{{ $first_media->getUrl() }}">
                            <!--begin::Image-->
                            <div
                                class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100"
                                style="background-image:url('{{ $first_media->getUrl() }}')">
                            </div>
                            <!--end::Image-->

                            <!--begin::Action-->
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <x-svg icon="eye" class="svg-icon-white svg-icon-2hx" />
                            </div>
                            <!--end::Action-->
                        </a>
                        <!--end::Item-->
                    </div>
                @endif

                <!--begin::Col-->
                <div class="col-6">
                    <!--begin::Row-->
                    <div class="row g-7 h-250px h-md-375px">
                        @foreach($question->images->skip(1) as $media)
                            @php /** @var \App\Models\Media $media */ @endphp
                            <div class="col-lg-12">
                                <!--begin::Item-->
                                <a class="d-block card-rounded overlay h-100"
                                   data-fslightbox="lightbox-projects"
                                   href="{{ $media->getUrl() }}">
                                    <!--begin::Image-->
                                    <div
                                        class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100"
                                        style="background-image:url('{{ $media->getUrl() }}')">
                                    </div>

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                        <x-svg icon="eye" class="svg-icon-white svg-icon-2hx" />
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
        @endif
    </div>
</div>
