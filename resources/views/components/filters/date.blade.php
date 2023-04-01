<div>
    @if(!empty($label))
        <label class="form-label text-start d-block" for="{{ $id }}">
            {{ $label }}
        </label>
    @endif

    <div class="position-relative">
        <input
            id="{{ $id }}"
            name="{{ $name }}"
            @if($defer)
                wire:model.defer="{{ $model }}"
            @else
                wire:model="{{ $model }}"
            @endif
            {{ $attributes->merge(['class' => 'form-control']) }}
            placeholder="{{ $placeholder }}"
            type="text"
            onfocus="this.type = '{{ $dateType }}'"
            onblur="this.type = 'text'"
        />
    </div>
</div>
