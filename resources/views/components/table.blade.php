<div class="card card-flush mb-5 mb-xl-8" id="livewire_table">
    <!--begin::Header-->
    @if($withHeader)
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">

                <!--begin::Title-->
                <span class="card-label fw-bold fs-3 mb-1 d-flex-start-wrap">
                    @if(!empty($title))
                        {{ $title }}
                    @else
                        {{ __('titles.Records') }}
                    @endif

                    @if($spinner)
                        <span class="spinner-border spinner-border-sm text-primary align-middle ms-2 h-30px w-30px"
                              wire:loading></span>
                    @endif
                </span>
                <!--End::Title-->

                <!--begin::Subtitle-->
                <span class="text-muted mt-1 fw-semibold fs-7">
                    @if(method_exists($list, 'total') && $list->total() > 0)
                        {{ $list->total() }}

                        @if(!empty($subtitle))
                            {{ $subtitle }}
                        @elseif($withSubtitle)
                            {{ __('titles.Record') }}
                        @endif
                    @endif
                </span>
                <!--End::Subtitle-->

            </h3>

            <!--begin::Actions-->
            <div class="card-toolbar">
                {{ $actions }}

                @if($withExport)
                    <x-tooltip text="{{ __('actions.Export') }}" id="export" wire:click="export">
                        <button class="btn btn-sm btn-icon btn-primary me-1">
                            <x-svg icon="export" />
                        </button>
                    </x-tooltip>
                @endif
                @if($withFilter)
                    <x-tooltip text="{{ __('titles.Filters') }}" id="filter">
                        <button class="btn btn-sm btn-icon btn-light btn-active-primary position-relative"
                                id="filter-toggle">
                            <x-svg icon="filter" />

                            @if($hasFilters)
                                <i class="fa-solid fa-circle text-danger absolute-end-top-percentage fs-9"></i>
                            @endif
                        </button>
                    </x-tooltip>
                @endif
            </div>
            <!--End::Actions-->
        </div>
    @endif

    <!--Body-->
    <div class="card-body py-3">
        <div class="d-flex-end mb-10">
            @if(method_exists($list, 'links'))
                {{ $list->links() }}
            @endif
        </div>

        {{ $before }}

        <div class="table-responsive">
            <table {{ $attributes(['class' => 'table table-row-gray-300 align-middle table-row-dashed gs-0 gy-4 text-start']) }}>
                <thead>
                <tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    {{ $thead }}
                </tr>
                </thead>

                <tbody>
                @if(empty($list) || (is_iterable($list) && sizeof($list) == 0))
                    <td colspan="100%" class="fs-5 text-center">
                        {{ __('titles.NoDataAvailable') }}
                    </td>
                @else
                    {{ $slot }}
                @endif
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            const livewire_table = document.querySelector('#livewire_table')

            const blockUI = new KTBlockUI(livewire_table, {
                message: `<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>`,
                overlayClass: "bg-dark bg-opacity-10",
            });

            Livewire.hook("message.sent", () => {
                blockUI.block();
            })

            Livewire.hook("message.processed", () => {
                KTMenu.updateDropdowns();
                blockUI.release();
            })

            Livewire.hook("message.failed", () => {
                KTMenu.updateDropdowns();
                blockUI.release();
            })
        </script>
    @endpush

    <!-- For modals, canvas, ... -->
    {{ $extra }}
</div>
