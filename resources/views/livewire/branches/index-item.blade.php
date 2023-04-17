@php /** @var \App\Models\Branch $branch */ @endphp
<tr>
    <td>{{ $branch->id }}</td>
    <td>{{ $branch->name }}</td>
    <td>{{ $branch->created_at?->format('Y-m-d') }}</td>
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
        </x-dropdown.menu>
    </td>
</tr>
