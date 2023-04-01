@php /** @var \App\Models\User $user */ @endphp
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->username }}</td>
    <td>
        <x-widgets.badge class="min-w-60px" :variant="$user->isActive() ? 'success' : 'danger'">
            <span class="w-100 text-center">{{ $user->getStatus() }}</span>
        </x-widgets.badge>
    </td>
    <td>{{ $user->created_at?->format('Y-m-d') }}</td>
    <td>
        <x-dropdown.menu menu="min-w-200px">
            <x-slot name="trigger">
                {{ __('actions.Actions') }}
            </x-slot>

            <x-dropdown.item data-bs-toggle="modal" data-bs-target="#user_status_{{ $user->id }}">
                @if($user->isActive())
                    <x-dropdown.link>
                        <x-svg icon="double-switch" class="svg-icon-danger svg-icon-2x" />
                        <span class="ms-2 fw-bolder">{{ __('actions.Deactivate') }}</span>
                    </x-dropdown.link>
                @else
                    <x-dropdown.link>
                        <x-svg icon="double-switch" class="svg-icon-danger" />
                        <span class="ms-2 fw-bolder">{{ __('actions.Activate') }}</span>
                    </x-dropdown.link>
                @endif
            </x-dropdown.item>

            <x-dropdown.item>
                <x-dropdown.link :href="route('users.edit', ['user' => $user])">
                    <x-svg icon="pencil" class="svg-icon-muted svg-icon-2x" />
                    <span class="ms-2 fw-bolder">{{ __('actions.Edit') }}</span>
                </x-dropdown.link>
            </x-dropdown.item>
        </x-dropdown.menu>

        <x-widgets.modal id="user_status_{{ $user->id }}">
            <x-slot name="title">
                @if($user->isActive())
                    {{ __('titles.DeactivateUser') }}
                @else
                    {{ __('titles.ActivateUser') }}
                @endif
            </x-slot>

            <x-slot name="subtitle">
                {{ $user->name }}
            </x-slot>

            <div class="w-100 text-center">
                <h4>
                    @if($user->isActive())
                        {{ __('titles.ConfirmDeactivateUser') }}
                    @else
                        {{ __('titles.ConfirmActivateUser') }}
                    @endif
                </h4>
            </div>

            <x-slot name="footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                    {{ __('actions.Close') }}
                </button>
                <button wire:click="changeActivation" data-bs-dismiss="modal"
                        class="btn {{ $user->isActive() ? 'btn-danger' : 'btn-primary' }}">
                    @if($user->isActive())
                        {{ __('actions.Deactivate') }}
                    @else
                        {{ __('actions.Activate') }}
                    @endif
                </button>
            </x-slot>
        </x-widgets.modal>
    </td>
</tr>
