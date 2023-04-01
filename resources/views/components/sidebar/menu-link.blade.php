<div class="menu-item">
    <a {{ $attributes->merge(['class' => 'menu-link']) }}href="{{ $href }}">
        <label class="menu-bullet">
            <span class="bullet bullet-dot"></span>
        </label>
        <label class="menu-title">
            {{ $slot }}
        </label>
    </a>
</div>
