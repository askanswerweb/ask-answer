<div>
    @if(!empty($label))
        <label class="form-label text-start d-block" for="{{ $id }}">
            {{ $label }}
        </label>
    @endif

    <div class="position-relative">
        @if($withIcon)
            <x-svg icon="search" :absolute="true" />
        @endif

        <select
            id="{{ $id }}"
            {{ $attributes(['class' => 'form-select form-select-solid border' . ($withIcon ? ' ps-10 ' : '')]) }}
            @if($defer)
                wire:model.defer="{{ $model }}"
            @else
                wire:model="{{ $model }}"
            @endif
        >
            <option value="0" hidden>{{ $label ?: __('titles.Role') }}</option>
            @foreach ($roles as $role)
                <option value="{{ $role }}">{{ __("titles.$role") }}</option>
            @endforeach
        </select>
    </div>
</div>
