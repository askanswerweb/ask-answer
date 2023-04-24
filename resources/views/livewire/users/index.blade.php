<div class="container-fluid">
    <x-breadcrumb.container :header="__('titles.Users')">
        <x-breadcrumb.link :href="route('home')">
            {{ __('titles.Dashboard') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>{{ __('titles.Users') }}</x-breadcrumb.muted>
    </x-breadcrumb.container>


    <x-table :list="$list" :title="__('titles.Users')" :with-export="false" class="text-center">
        <x-slot name="actions">
            <x-tooltip text="{{ __('actions.Create') }}">
                <a href="{{ route('users.create') }}"
                   class="btn btn-sm btn-icon btn-success me-1">
                    <x-svg icon="square-plus" />
                </a>
            </x-tooltip>
        </x-slot>

        <x-slot name="thead">
            <th>#</th>
            <th>{{ __('titles.Name') }}</th>
            <th>{{ __('titles.Username') }}</th>
            <th>{{ __('titles.Status') }}</th>
            <th>{{ __('titles.Role') }}</th>
            <th>{{ __('titles.CreateDate') }}</th>
            <th class="min-w-50px">{{ __('actions.Manage') }}</th>
        </x-slot>

        @foreach($list as $user)
            @livewire('users.index-item', ['user' => $user], key(microtime()))
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
                    <label class="form-label fw-bolder" for="username">{{ __('titles.Username') }}</label>
                    <input
                        id="username"
                        type="text"
                        class="form-control form-control-solid"
                        wire:model.defer="username"
                        placeholder="{{ __('titles.Username') }}"
                    />
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bolder" for="status">{{ __('titles.Status') }}</label>
                    <x-filters.user-status />
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bolder" for="status">{{ __('titles.Role') }}</label>
                    <x-filters.user-role />
                </div>

                <div class="mb-5">
                    <label class="form-label fw-bolder">{{ __('titles.CreateDate') }}</label>
                    <x-filters.date-range class="form-control-solid" />
                </div>
            </x-filters.container>
        </x-slot>
    </x-table>
</div>
