<div {{ $attributes->merge(['class' => 'menu-item']) }}>
    <a class="menu-link" href="{{ $href }}">
        <span class="menu-icon">
            {{ $icon }}
        </span>
        <span class="menu-title">
            {{ $slot }}
        </span>
    </a>
</div>
