@props(['url' => ''])

<div class="separator my-5"></div>

<div class="d-flex-end">
    <a href="{{ locale_url(proper_locale(true), $url) }}" class="btn btn-sm btn-bg-light">
        <i class="fa-solid fa-globe me-2"></i>
        <span>{{ target_locale() }}</span>
    </a>
</div>
