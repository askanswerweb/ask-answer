<div class="container-fluid">
    <x-breadcrumb.container :header="__('titles.Questions')">
        <x-breadcrumb.link :href="route('home')">
            {{ __('titles.Dashboard') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>{{ __('titles.Questions') }}</x-breadcrumb.muted>
    </x-breadcrumb.container>


    <x-table :list="$list" :title="__('titles.Questions')" :with-export="false" class="text-center">
        <x-slot name="actions">
            <x-tooltip text="{{ __('actions.Create') }}">
                <a href="{{ route('questions.create') }}"
                   class="btn btn-sm btn-icon btn-success me-1">
                    <x-svg icon="square-plus" />
                </a>
            </x-tooltip>
        </x-slot>

        <x-slot name="thead">
            <th>#</th>
            <th class="mw-150px">{{ __('titles.Title') }}</th>
            <th>{{ __('titles.User') }}</th>
            <th>{{ __('titles.Answers') }}</th>
            <th>{{ __('titles.Status') }}</th>
            <th>{{ __('titles.CreateDate') }}</th>
            <th>{{ __('actions.Manage') }}</th>
        </x-slot>

        @foreach($list as $question)
            @livewire('questions.index-item', ['question' => $question], key(microtime()))
        @endforeach

        <x-slot name="extra">
            <x-filters.container>
                <div class="mb-5">
                    <label class="form-label fw-bolder" for="name">{{ __('titles.Name') }}</label>
                    <input
                        id="name"
                        type="text"
                        class="form-control form-control-solid"
                        wire:model.defer="name"
                        placeholder="{{ __('titles.Name') }}"
                    />
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bolder" for="questionname">{{ __('titles.Username') }}</label>
                    <input
                        id="questionname"
                        type="text"
                        class="form-control form-control-solid"
                        wire:model.defer="questionname"
                        placeholder="{{ __('titles.Username') }}"
                    />
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bolder">{{ __('titles.CreateDate') }}</label>
                    <x-filters.date-range class="form-control-solid" />
                </div>
            </x-filters.container>
        </x-slot>
    </x-table>
</div>
