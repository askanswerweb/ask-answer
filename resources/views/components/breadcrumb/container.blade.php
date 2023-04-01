<div {{ $attributes->merge(['class' => 'app-toolbar pb-5']) }}>
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            {{ $header }}
        </h1>
        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
            {{ $slot }}
        </ul>
    </div>
</div>
