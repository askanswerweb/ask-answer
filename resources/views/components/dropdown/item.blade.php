<div {{$attributes->merge(['class' => 'dropdown-item rounded py-1 w-100 position-relative cursor-pointer text-dark'])}}>
    {{ $slot }}
</div>

@if($withDivider)
    <div class="dropdown-divider p-0 m-0"></div>
@endif
