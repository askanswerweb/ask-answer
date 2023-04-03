@php /** @var \App\Models\Media $media */ @endphp
<div class="col-md-6 col-lg-4 col-xl-3">
    <div class="card h-100 bg-light">
        <div class="card-body d-flex justify-content-center text-center flex-column my-0">
            <div class="text-gray-800 text-hover-primary d-flex flex-column">
                <div class="symbol symbol-60px mb-5">
                    @if($media->isImage())
                        <img src="{{ $media->getUrl() }}" alt="">
                    @else
                        <x-svg icon="file" class="svg-icon-2hx" />
                    @endif
                </div>

                <div class="fs-5 fw-bold mb-2">{{ $media->file_name }}</div>
            </div>

            <div class="fs-7 fw-semibold text-gray-400">
                {{ $media->getCreatedAtForHumans() }}
            </div>
        </div>

        <div class="card-footer my-0 pt-0">
            <div class="d-flex-center-wrap">
                <button class="btn btn-sm btn-icon btn-danger me-2" data-bs-toggle="modal"
                        data-bs-target="#delete_media_{{ $media->id }}">
                    <x-svg icon="times" />
                </button>
                <x-livewire.action :with-text="false" wire-click="show" class="btn-sm btn-icon btn-primary">
                    <x-svg icon="download" />
                </x-livewire.action>

                <x-widgets.modal id="delete_media_{{ $media->id }}"
                                 :title="__('actions.Delete')"
                                 :subtitle="$media->file_name">
                    <div class="w-100 text-center">
                        <h4>{{ __('actions.ConfirmDelete') }}</h4>
                        <div class="text-muted fw-semibold fs-5">
                            {{ __('titles.CantRevert') }}
                        </div>
                    </div>

                    <x-slot name="footer">
                        <button class="btn btn-light" data-bs-dismiss="modal">
                            {{ __('actions.Cancel') }}
                        </button>
                        <button class="btn btn-danger"
                                wire:click="delete"
                                data-bs-dismiss="modal">
                            {{ __('actions.Delete') }}
                        </button>
                    </x-slot>
                </x-widgets.modal>
            </div>
        </div>
    </div>
</div>
