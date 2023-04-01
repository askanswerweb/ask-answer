<div data-kt-menu-trigger="click" {{ $attributes->merge(['class' => 'menu-item menu-accordion']) }}>
    <label class="menu-link">
        <label class="menu-icon">
            {{ $icon }}
        </label>
        <label class="menu-title">
            {{ $title }}
        </label>
        <label class="menu-arrow"></label>
    </label>

    <div class="menu-sub menu-sub-accordion">
        {{ $slot }}
    </div>
</div>
