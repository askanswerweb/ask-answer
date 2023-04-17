<button {{ $attributes->merge(['class' => 'btn btn-sm btn-flex cursor-pointer']) }}
    data-kt-menu-trigger="click" data-kt-menu-placement="{{ is_arabic() ? 'bottom-start' : 'bottom-end' }}">
    {{ $slot }}
</button>
