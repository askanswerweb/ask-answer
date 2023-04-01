<div {{ $attributes->merge(['class' => 'menu menu-sub menu-sub-dropdown w-250px w-md-300px']) }} data-kt-menu="true" id="{{ $id }}">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-5 text-dark fw-bold">
            {{ $title }}
        </div>
    </div>

    <div class="separator border-gray-200"></div>

    <div class="px-7 py-5">
        {{ $slot }}

        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" id="filter_reset_{{ $id }}">
                {{ __('actions.Reset') }}
            </button>
            <button type="button" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true" id="filter_menu_{{ $id }}">
                {{ __('actions.Filter') }}
            </button>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const menuElement = document.querySelector("#{{ $id }}");
                const menu = KTMenu.getInstance(menuElement);
                $("#filter_menu_{{ $id }}").on('click', function () {
                    menu.hide();
                    @this.filter();
                })

                $("#filter_reset_{{ $id }}").on('click', function () {
                    menu.hide();
                    @this.resetFilters();
                })

                document.addEventListener('close-filters', function () {
                    menu.update();
                })
            });
        </script>
    @endpush
</div>
