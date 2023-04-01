<div {{ $attributes->merge(['class' => 'symbol']) }} data-bs-toggle="tooltip" title="{{ $title }}">
    <span class="symbol-label bg-{{ $color }} text-inverse-{{ $color }} fw-bold">
        {{ $slot }}
    </span>
</div>
