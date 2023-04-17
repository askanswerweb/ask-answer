@php /** @var \App\Models\Branch $branch */ @endphp
<tr>
    <td>{{ $branch->id }}</td>
    <td>{{ $branch->name }}</td>
    <td>{{ number_format($users) }}</td>
    <td>
        <x-tooltip :text="$branch->created_at">
            {{ $branch->getCreatedAtForHumans() }}
        </x-tooltip>
    </td>
    <td>
        <x-dropdown.menu menu="min-w-200px">
            <x-slot name="trigger">
                {{ __('actions.Actions') }}
            </x-slot>

            <x-dropdown.item>
                <x-dropdown.link :href="route('branches.edit', ['branch' => $branch])">
                    <x-svg icon="pencil" class="svg-icon-muted" />
                    <span class="ms-2 fw-bolder">{{ __('actions.Edit') }}</span>
                </x-dropdown.link>
            </x-dropdown.item>

            <x-dropdown.item>
                <x-dropdown.link data-bs-target="#delete_{{ $branch->id }}" data-bs-toggle="modal">
                    <x-svg icon="trash-solid" class="svg-icon-danger" />
                    <span class="ms-2 fw-bolder">{{ __('actions.Delete') }}</span>
                </x-dropdown.link>
            </x-dropdown.item>
        </x-dropdown.menu>

        <x-widgets.modal id="delete_{{ $branch->id }}" :title="__('actions.Delete')" :subtitle="$branch->title">
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
    </td>
</tr>
