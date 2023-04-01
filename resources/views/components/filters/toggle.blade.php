<label {{ $attributes->merge(['class' => 'form-check form-switch form-check-custom form-check-solid']) }} >
    <input
        id="{{ $id }}"
        type="checkbox"
        class="form-check-input"
        @if($defer)
            wire:model.defer="{{ $model }}"
        @else
            wire:model="{{ $model }}"
        @endif
    />
    <span class="form-check-label fw-semibold text-muted user-select-none">
        {{ $name }}
    </span>
</label>
