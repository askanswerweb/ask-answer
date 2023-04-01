<div {{ $attributes->merge(['class' => 'dropdown position-static']) }}>

    <button data-bs-toggle="dropdown" class="btn btn-sm text-dark {{ $btn }}">
        {{ $trigger }}
    </button>

    <div class="{{ $menu }}">
        {{ $slot }}
    </div>
</div>
