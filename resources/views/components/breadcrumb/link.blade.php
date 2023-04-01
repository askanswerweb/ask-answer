<li {{ $attributes->merge(['class' => 'breadcrumb-item text-muted']) }}>
    <a href="{{ $href }}" class="text-muted text-hover-primary">
        {{ $slot }}
    </a>
</li>
