@php /** @var \App\Models\Question $question */ @endphp
<div class="card card-flush mb-5">
    <div class="card-header pt-9">
        <div class="d-flex align-items-center">
            <div class="symbol symbol-50px me-5">
                <x-widgets.user-logo :user="$question->user" />
            </div>

            <div class="flex-grow-1">
                <a href="javascript:void(0);" class="text-gray-800 text-hover-primary fs-4 fw-bold">
                    {{ $question->user->name }}
                </a>

                <span class="text-gray-400 fw-semibold d-block">
                    {{ $question->getCreatedAtForHumans() }}
                </span>
            </div>
        </div>

        <div class="card-toolbar">
            <div class="m-0">
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
                    <div class="menu-item px-3">
                        <div class="menu-content fs-6 text-dark fw-bold px-3 py-4">
                            {{ __('titles.QuickActions') }}
                        </div>
                    </div>

                    <div class="separator mb-3 opacity-75"></div>

                    <div class="menu-item px-3">
                        <a href="{{ route('questions.preview', ['question' => $question->id]) }}"
                           class="menu-link px-3">
                            {{ __('actions.Preview') }}
                        </a>
                    </div>

                    @if(!auth()->user()->isWorker())
                        <div class="menu-item px-3">
                            <a href="{{ route('questions.answers', ['question' => $question->id]) }}"
                               class="menu-link px-3">
                                {{ __('actions.Answer') }}
                            </a>
                        </div>
                    @endif


                    @if(auth()->user()->isAdmin() || $question->isForAuth())
                        <div class="separator mt-3 opacity-75"></div>

                        <div class="menu-item px-3">
                            <div class="menu-content px-3 py-3">
                                <button class="btn btn-danger w-100 btn-sm px-4" data-bs-toggle="modal"
                                        data-bs-target="#delete_{{ $question->id }}">
                                    {{ __('actions.Delete') }}
                                </button>
                            </div>
                        </div>
                    @endif
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
        <div class="fs-6 fw-normal text-gray-700 mt-0 mb-5 pre-wrap">
            {!! $question->description !!}
        </div>

        @if($question->images->isNotEmpty())
            <div class="row g-7 h-250px h-md-375px">

                @if($first_media = $question->images->first())
                    @php /** @var \App\Models\Media $first_media */ @endphp

                    <div class="col-6">
                        <!--begin::Item-->
                        <a class="d-block card-rounded overlay h-100"
                           data-fslightbox="lightbox-projects"
                           href="{{ $first_media->getUrl() }}">
                            <div
                                class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-100"
                                style="background-image:url('{{ $first_media->getUrl() }}')">
                            </div>

                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                <x-svg icon="eye" class="svg-icon-white svg-icon-2hx" />
                            </div>
                        </a>
                    </div>
                @endif

                <div class="col-6">
                    <div class="row g-7 h-250px h-md-375px">
                        @foreach($question->images->skip(1)->take(3) as $media)
                            @php /** @var \App\Models\Media $media */ @endphp
                            <div class="col-lg-12">
                                <a class="d-block card-rounded overlay h-100"
                                   data-fslightbox="lightbox-projects"
                                   href="{{ $media->getUrl() }}">
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
                </div>
            </div>
        @endif
    </div>

    <div class="card-footer py-0">
        <div>
            <!--begin::Separator-->
            <div class="separator separator-solid"></div>
            <!--end::Separator-->

            <!--begin::Nav-->
            <ul class="nav py-3">
                <li class="nav-item">
                    <a href="#"
                       class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4 me-1">
                        {!! $question->status?->html() !!}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary btn-active-light-primary fw-bold px-4 me-1 collapsible active"
                       data-bs-toggle="collapse" href="#kt_social_feeds_comments_1">
                        <x-svg icon="message" />
                        {{ $question->answers?->count() }} {{ __('titles.Answers') }}
                    </a>
                </li>

                <li class="nav-item">
                    <button class="nav-link btn btn-sm btn-color-gray-600 btn-active-color-primary fw-bold px-4">
                        <i class="ki-duotone ki-bookmark fs-2 me-1"><span class="path1"></span><span
                                class="path2"></span></i>
                        {{ $question->branch?->name }}
                    </button>
                </li>
            </ul>
            <!--end::Nav-->
        </div>
    </div>
</div>
