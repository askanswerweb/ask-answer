<button
    @if($wireClick)
        wire:click="{{ $wireClick }}"
    @endif
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'btn']) }}
    wire:loading.attr="disabled"
>
    <span
        @if($wireClick || $target)
            wire:target="{{ $wireClick ?: $target }}"
        @endif
        class="indicator-label"
        wire:loading.remove
    >
        {{ $slot }}
    </span>
    <span
        @if($wireClick)
            wire:target="{{ $wireClick }}"
        @endif
        class="indicator-progress pm-0"
        wire:loading
    >
        @if($withText)
            {{ __('actions.PleaseWait') }}
        @endif
        <span class="spinner-border spinner-border-sm align-middle {{ $withText ? 'ms-2' : '' }}"></span>
    </span>
</button>
