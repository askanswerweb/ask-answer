@php /** @var \App\Models\Branch $branch */ @endphp
<div class="container-fluid">
    <x-breadcrumb.container :header="$branch->exists ? __('actions.Edit') : __('actions.Create')">
        <x-breadcrumb.link :href="route('branches.index')">
            {{ __('titles.Branches') }}
        </x-breadcrumb.link>

        <x-breadcrumb.bullet />

        <x-breadcrumb.muted>
            {{ $branch->exists ? __('actions.Edit') : __('actions.Create') }}
        </x-breadcrumb.muted>
    </x-breadcrumb.container>

    <div class="row mb-6 g-5">
        <div class="col-lg-4 py-0">
            <div class="card mb-6">
                <div class="card-header border-0">
                    <div class="card-title m-0">
                        <h3 class="fw-bold m-0">
                            {{ __('titles.Details') }}
                        </h3>
                    </div>
                </div>

                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="name">
                            {{ __('titles.Name') }}
                        </label>

                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" id="name" wire:model.defer="branch.name"
                                   class="form-control form-control-solid @error('branch.name') is-invalid @enderror"
                                   placeholder="{{ __('words.name') }}" />
                            @error('branch.name')
                            <div class="fv-plugins-message-container invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex-end mb-6 mb-xl-10">
                <a href="{{ route('branches.index') }}" class="btn btn-light bg-body text-gray-800 me-2">
                    {{ __('actions.Back') }}
                </a>

                <x-livewire.action wire-click="save" class="btn btn-primary">
                    {{ __('actions.Save') }}
                </x-livewire.action>
            </div>
        </div>

        <div class="col-lg-8 py-0">
            <div class="card mb-6 h-lg-100" id="users_table">
                <div class="card-header border-0">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1" for="search">
                            <x-svg icon="search" :absolute="true" />
                            <input
                                id="search"
                                wire:model.debounce.600ms="search"
                                type="search"
                                class="form-control form-control-solid w-250px ps-13"
                                placeholder="{{ __('actions.Search') }}"
                            />
                        </div>
                    </div>

                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="m-0">
                                <x-filters.container-menu-trigger class="btn-light btn-sm btn-icon me-1">
                                    <x-svg icon="filter" />
                                </x-filters.container-menu-trigger>

                                <x-filters.container-menu id="users_filter">
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold" for="name">
                                            {{ __('titles.Name') }}
                                        </label>

                                        <div>
                                            <input
                                                id="name"
                                                wire:model.defer="name"
                                                type="text"
                                                class="form-control form-control-solid"
                                                placeholder="{{ __('titles.Name') }}"
                                            />
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">
                                            {{ __('titles.consultant') }}
                                        </label>

                                        <div class="d-flex">
                                            <x-filters.toggle
                                                :name="__('titles.consultant')"
                                                class="form-switch-sm"
                                                model="is_consultant"
                                            />
                                        </div>
                                    </div>

                                    @if($branch->exists)
                                        <div class="mb-5">
                                            <label class="form-label fw-semibold">
                                                {{ __('titles.Selected') }}
                                            </label>

                                            <div class="d-flex">
                                                <x-filters.toggle
                                                    :name="__('titles.Selected')"
                                                    class="form-switch-sm"
                                                    model="is_selected"
                                                />
                                            </div>
                                        </div>
                                    @endif
                                </x-filters.container-menu>
                            </div>


                            <div class="fw-bold btn btn-sm btn-{{ $is_selected ? '' : 'light-' }}primary" wire:click="toggleSelected">
                                <span class="me-1">{{ number_format(count($selected)) }}</span>
                                {{ __('titles.Selected') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body py-0" wire:key="{{ microtime() . "_users_table" }}">

                    <div class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6" id="kt_users_table">
                                <thead>
                                <tr>
                                    <th class="py-0"></th>
                                    <th class="py-0">{{ __('titles.Name') }}</th>
                                    <th class="py-0">{{ __('titles.Role') }}</th>
                                </tr>
                                </thead>
                                <tbody class="fw-semibold">
                                @foreach($users as $user)
                                    @php /** @var \App\Models\User $user */ @endphp
                                    <tr>
                                        <td class="py-2">
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input
                                                    id="customer_{{ $user->id }}"
                                                    type="checkbox"
                                                    class="form-check-input"
                                                    wire:model.defer="selected"
                                                    value="{{ $user->id }}"
                                                />
                                            </div>
                                        </td>
                                        <td class="py-2">
                                            <label class="fw-bold" for="customer_{{ $user->id }}">{{ $user->name }}</label>
                                        </td>
                                        <td class="py-2">{{ $user->getRole() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="card-footer p-2">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                new LivewireBlockUI("#users_table")
            });
        </script>
    @endpush
</div>
