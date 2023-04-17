<div class="container-fluid">
    <x-breadcrumb.container :header="__('titles.Branches')">
        <x-breadcrumb.link :href="route('home')">
            {{ __('titles.Dashboard') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>{{ __('titles.Branches') }}</x-breadcrumb.muted>
    </x-breadcrumb.container>


    <x-table :list="$list" :title="__('titles.Branches')" :with-export="false" class="text-center">
        <x-slot name="actions">
            <x-tooltip text="{{ __('actions.Create') }}">
                <a href="{{ route('branches.create') }}"
                   class="btn btn-sm btn-icon btn-success me-1">
                    <x-svg icon="square-plus" />
                </a>
            </x-tooltip>
        </x-slot>

        <x-slot name="thead">
            <th>#</th>
            <th>{{ __('titles.Name') }}</th>
            <th>{{ __('titles.CreateDate') }}</th>
            <th class="min-w-50px">{{ __('actions.Manage') }}</th>
        </x-slot>

        @foreach($list as $branch)
            @livewire('branches.index-item', ['branch' => $branch], key(microtime()))
        @endforeach

        <x-slot name="extra">
            <x-filters.container>
                <div class="mb-5">
                    <label class="form-label fw-bolder" for="branch_id">{{ __('inputs.ID') }}</label>
                    <input
                        id="branch_id"
                        type="text"
                        class="form-control form-control-solid"
                        wire:model.defer="branch_id"
                        placeholder="{{ __('inputs.ID') }}"
                    />
                </div>

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
                    <label class="form-label fw-bolder">{{ __('titles.CreateDate') }}</label>
                    <x-filters.date-range class="form-control-solid" />
                </div>
            </x-filters.container>
        </x-slot>
    </x-table>
</div>
