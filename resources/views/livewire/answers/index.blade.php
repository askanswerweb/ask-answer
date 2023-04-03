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
                @foreach($list as $item)
                    @livewire('answers.index-item', ['answer' => $item], key(microtime()))
                @endforeach
            </div>
        </div>
    </div>

    <x-filters.container>
        <div class="mb-5">
            <label class="form-label fw-bolder" for="answer_id">{{ __('titles.AnswerID') }}</label>
            <input
                id="answer_id"
                type="text"
                class="form-control form-control-solid"
                wire:model.defer="answer_id"
                placeholder="{{ __('titles.AnswerID') }}"
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
