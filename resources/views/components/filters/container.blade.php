<div id="filters_drawer" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
     data-kt-drawer-activate="true"
     data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'400px'}"
     data-kt-drawer-direction="{{ is_english() ? 'start' : 'end' }}"
     data-kt-drawer-toggle="{{ $toggle }}" data-kt-drawer-close="#filters_drawer_close">
    <div class="card w-100 rounded-0" id="filters_drawer_card">
        <div
            class="card-header bgi-position-y-bottom bgi-position-x-end bgi-size-cover bgi-no-repeat rounded-0 border-0 py-4"
            id="filters_drawer_header">
            <div class="card-title">
                <div class="d-flex justify-content-center flex-column me-3">
                    <h3 class="card-title fs-3 fw-bold text-white flex-column m-0">
                        {{ __('titles.Filters') }}
                    </h3>
                </div>
            </div>

            <!-- Card Close -->
            <div class="card-toolbar">
                <x-tooltip :text="__('actions.Close')">
                    <button
                        class="btn btn-sm btn-icon bg-white bg-opacity-25 btn-color-white p-0 w-20px h-20px rounded-1"
                        id="filters_drawer_close">
                        <x-svg icon="close" />
                    </button>
                </x-tooltip>
            </div>
        </div>

        <div class="card-body" id="filters_drawer_body">
            {{ $slot }}
        </div>

        <div class="card-footer d-flex-center-wrap gap-3" id="filters_drawer_footer">
            <button type="button" class="btn btn-light flex-grow-1 fw-semibold" id="reset_drawer_action">
                <span class="indicator-label" wire:loading.attr="disabled">{{ __('actions.Clear') }}</span>
            </button>
            <button type="button" class="btn btn-primary flex-grow-1 fw-semibold" id="filter_drawer_action">
                <span class="indicator-label" wire:loading.attr="disabled">{{ __('actions.Filter') }}</span>
            </button>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const drawerElement = document.querySelector("#filters_drawer");
                const drawer = KTDrawer.getInstance(drawerElement);
                $('#filters_drawer_footer #filter_drawer_action').on('click', function () {
                    drawer.hide();
                    @this.filter();
                })

                $('#filters_drawer_footer #reset_drawer_action').on('click', function () {
                    drawer.hide();
                    @this.resetFilters();
                })

                document.addEventListener('close-filters', function () {
                    drawer.update();
                })
            });
        </script>
    @endpush

    @push('styles')
        <style>
            #filters_drawer_header {
                background-image: url('{{ asset('assets/media/misc/layout/header-bg.jpg') }}');
            }
        </style>
    @endpush
</div>
