@php /** @var \App\Models\Question $question */ @endphp
<div class="container-fluid">
    <x-breadcrumb.container :header="__('titles.Answers')">
        <x-breadcrumb.link :href="route('home')">
            {{ __('titles.Dashboard') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.link :href="route('questions.index')">
            {{ __('titles.Questions') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>{{ __('titles.Answers') }}</x-breadcrumb.muted>
    </x-breadcrumb.container>

    <div class="card card-flush bg-transparent pm-0 w-100">
        <div class="card-header pm-0">
            <h3 class="card-title align-items-start flex-column pm-0">
                <label class="card-label fw-bold fs-3 mb-1 d-flex-start-wrap pm-0">
                    {{ $list->total() }}
                    {{ __('titles.Answers') }}
                </label>
            </h3>

            <div class="card-toolbar">
                {!! $list->links() !!}
            </div>
        </div>

        <div class="card-body pm-0">
            <div class="row g-3 g-xl-5 mb-5" id="livewire-container">
                <div id="kt_app_content" class="px-0 app-content flex-column-fluid">
                    <div id="kt_app_content_container" class="">
                        <div class="d-flex flex-column flex-xl-row">
                            <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-5">
                                <div class="card card-flush mb-5 mb-xl-8" data-kt-sticky="true"
                                     data-kt-sticky-name="docs-sticky-summary"
                                     data-kt-sticky-offset="{default: false, xl: '300px'}"
                                     data-kt-sticky-width="{xl: '300px'}"
                                     data-kt-sticky-left="auto"
                                     data-kt-sticky-top="100px"
                                     data-kt-sticky-animation="false"
                                     data-kt-sticky-zindex="95">
                                    <div class="card-body py-9">
                                        <div class="d-flex flex-column h-100">
                                            <div class="mb-7">
                                                <div class="d-flex flex-stack mb-6">
                                                    <div class="flex-shrink-0 me-5">
                                                        <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">
                                                            {{ $question->getCreatedAtForHumans() }}
                                                        </span>

                                                        <span class="text-gray-800 fs-1 fw-bold">
                                                            {{ $question->title }}
                                                        </span>
                                                    </div>
                                                </div>

                                                <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                                                    <div class="d-flex align-items-center me-5 me-xl-13">
                                                        <div class="symbol symbol-30px symbol-circle me-3">
                                                            <x-svg icon="user" class="symbol-label bg-light" />
                                                        </div>

                                                        @if($question->user)
                                                            <div class="m-0">
                                                                <label class="fw-semibold text-gray-400 d-block fs-8">
                                                                    {{ __('titles.User') }}
                                                                </label>
                                                                @if(auth()->user()->isAdmin())
                                                                    <a href="{{ route('users.edit', ['user' => $question->user->id]) }}"
                                                                       target="_blank"
                                                                       class="fw-bold text-gray-800 text-hover-primary fs-7">
                                                                        {{ $question->user->firstName() }}
                                                                    </a>
                                                                @else
                                                                    <label
                                                                        class="fw-bold text-gray-800 text-hover-primary fs-7">
                                                                        {{ $question->user->firstName() }}
                                                                    </label>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-6 mh-200px overflow-y-auto pre-wrap">
                                                {!! $question->description !!}
                                            </div>

                                            <div class="w-100 d-flex-end">
                                                <button class="btn btn-sm btn-light btn-active-primary me-2"
                                                        id="filter-toggle">
                                                    {{ __('actions.Filter') }}
                                                </button>

                                                <a class="btn btn-success btn-sm"
                                                   href="{{ route('questions.answers.create', ['question' => $question->id]) }}">
                                                    {{ __('actions.Answer') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ms-xl-3 g-3">
                                @foreach($list as $item)
                                    @livewire('answers.index-item', ['answer' => $item], key(microtime()))
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-filters.container>
        <div class="mb-5">
            <label class="form-label fw-bolder" for="user_id">{{ __('titles.User') }}</label>
            <x-filters.select2
                model="user_id"
                url="users"
                :title="__('titles.User')"
                :selected-id="@$selected_user->id"
                :selected-text="@$selected_user->name"
            />
        </div>

        <div class="mb-5">
            <label class="form-label fw-bolder">{{ __('inputs.CreateDate') }}</label>
            <x-filters.date-range class="form-control-solid" />
        </div>
    </x-filters.container>

    @push('scripts')
        <script src="{{ asset('assets/js/block-livewire.js') }}"></script>
    @endpush
</div>
