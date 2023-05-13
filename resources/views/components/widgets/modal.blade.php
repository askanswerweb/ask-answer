<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-modal="true" role="dialog"
     @if($wireIgnore) wire:ignore.self @endif>
    <div {{ $attributes->merge(['class' => 'modal-dialog modal-dialog-centered']) }} id="modal_dialog_{{ $id }}">
        <div class="modal-content rounded" id="modal_content_{{ $id }}">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <x-svg icon="close" />
                </div>
            </div>

            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <div class="mb-13 text-center">
                    <h1 class="mb-3">
                        {{ $title }}
                    </h1>

                    <div class="text-muted fw-semibold fs-5">
                        {{ $subtitle }}
                    </div>
                </div>
                {{ $slot }}
            </div>

            <div class="modal-footer border-0">
                {{ $footer }}
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                new LivewireBlockUI("#modal_content_{{ $id }}")
                new DraggableModal("#{{ $id }}")
            })
        </script>
    @endpush
</div>
