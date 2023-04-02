@props(['title' => null, 'variant' => null])

@if($title && $variant)
    <x-widgets.badge variant="{{ $variant }}" class="fw-bolder">
        {{ $title }}
    </x-widgets.badge>
@endif
