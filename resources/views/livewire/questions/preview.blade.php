@php
    /** @var \App\Models\Question $question */
    /** @var \App\Models\Media $firstMedia */
@endphp
<div class="d-flex flex-column flex-column-fluid">

    <div id="kt_app_toolbar" class="app-toolbar py-3 d-flex-between-wrap">
        <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                {{ __('titles.Question') }}
            </h1>

            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">
                        {{ __('titles.Dashboard') }}
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-400 w-5px h-2px"></span>
                </li>

                <li class="breadcrumb-item text-muted">
                    {{ __('titles.Question') }}
                </li>
            </ul>
        </div>

        <div class="d-flex align-items-center gap-2 gap-lg-3">
            @if($question->isForAuth() && !$question->isClosed())
                <div class="m-0">
                    <a href="{{ route('questions.edit', ['question' => $question->id]) }}"
                       class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold">
                        {{ __('actions.Edit') }}
                    </a>
                </div>
            @endif

            @if(auth()->user()->isAdmin())
                <a href="{{ route('questions.answers', ['question' => $question->id]) }}"
                   class="btn btn-sm fw-bold btn-primary">
                    {{ __('actions.Answer') }}
                </a>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-body p-lg-20 pb-lg-0">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-lg-row-fluid me-xl-15">
                    <div class="mb-17">
                        <div class="mb-8">
                            <div class="d-flex flex-wrap mb-6">
                                <div class="me-9 my-1">
                                    <x-svg icon="layout-4-blocks" class="svg-icon-primary fs-2 me-1" />

                                    <span class="fw-bold text-gray-400">
                                        {{ $question->created_at?->format('d M Y') }}
                                    </span>
                                </div>

                                <div class="me-9 my-1">
                                    <x-svg icon="message" class="svg-icon-primary fs-2 me-1" />

                                    <span class="fw-bold text-gray-400">
                                        {{ $question->answers->count() }}
                                        {{ __('titles.Answers') }}
                                    </span>
                                </div>

                                <div class="my-1">
                                    {!! $question->status?->html() !!}
                                </div>
                            </div>

                            <a href="#" class="text-dark text-hover-primary fs-2 fw-bold">
                                {{ $question->title }}

                                <span class="fw-bold text-muted fs-5 ps-1">
                                    {{ $question->getCreatedAtForHumans() }}
                                </span>
                            </a>

                            <div class="overlay mt-8">
                                @if($firstMedia?->isImage())
                                    <div
                                        class="bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-350px"
                                        style="background-image:url('{{ $firstMedia->getUrl() }}')">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="fs-5 fw-semibold text-gray-600">
                            <!--begin::Text-->
                            <p class="mb-8 pre-wrap">
                                {!! $question->description !!}
                            </p>
                        </div>

                        @livewire('questions.preview-answer-list', ['question' => $question], key("answers_" . microtime()))
                    </div>
                    <!--end::Post content-->


                </div>
                <!--end::Content-->

                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                    <div class="m-0">
                        <h4 class="text-dark mb-7">
                            {{ __('titles.Files') }}
                        </h4>

                        @if(!$question->hasMedia())
                            <div class="d-flex align-items-center border-1 border-dashed card-rounded p-5">
                                <div class="text-muted fw-semibold fs-6 text-center w-100">
                                    {{ __('titles.NoMedia') }}
                                </div>
                            </div>
                        @else
                            @foreach($question->getMedia() as $file)
                                @php /** @var \App\Models\Media $file */ @endphp
                                <div class="d-flex flex-stack mb-7">

                                    <div class="symbol symbol-60px symbol-2by3 me-4">
                                        @if($file->isImage())
                                            <div class="symbol-label"
                                                 style="background-image: url('{{ $file->getUrl() }}')"></div>
                                        @endif
                                    </div>

                                    <div class="m-0" wire:click="download('{{ $file->id }}')">
                                        <label class="text-dark fw-bold text-hover-primary fs-6 cursor-pointer">
                                            {{ __('titles.File') }}
                                        </label>

                                        <span>
                                            <span
                                                class="text-muted text-hover-primary fw-semibold d-block pt-1 fs-7 cursor-pointer"
                                                wire:target="download('{{ $file->id }}')"
                                                wire:loading.remove>
                                                {{ __('titles.ToDownload') }}
                                            </span>
                                            <span
                                                wire:target="download('{{ $file->id }}')"
                                                class="indicator-progress pm-0"
                                                wire:loading
                                            >
                                                <span class="spinner-border spinner-border-sm align-middle"></span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
