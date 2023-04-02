<section>
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    {{ __('titles.QuestionDetails') }}
                </h3>
            </div>
        </div>

        <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
            <div class="card-body border-top p-9">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="title">
                        {{ __('inputs.Title') }}
                    </label>

                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input
                            id="title"
                            wire:model.defer="question.title"
                            type="text"
                            class="form-control form-control-solid"
                            placeholder="{{ __('inputs.NameAR') }}"
                        />

                        @error('question.title')
                        <div class="fv-plugins-message-container invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="description">
                        {{ __('inputs.Description') }}
                    </label>

                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <textarea
                        id="description"
                        wire:model.defer="question.description"
                        type="text"
                        class="form-control form-control-solid resize-none"
                        placeholder="{{ __('inputs.Description') }}"
                        autocomplete="off"
                        rows="3"
                        data-kt-autosize="true"
                    ></textarea>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="files">
                        {{ __('titles.Files') }}
                    </label>

                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                        <input type="file" class="form-control form-control-solid" wire:model="files" multiple />
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a href="{{ route('questions.index') }}" class="btn btn-light btn-active-light-primary me-2"
               wire:loading.remove wire:target="save">
                {{ __('actions.Back') }}
            </a>
            <x-livewire.action wire-click="save" class="btn-primary">
                {{ __('actions.Save') }}
            </x-livewire.action>
        </div>
    </div>

    @if($question->exists)
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">
                        {{ __('titles.Files') }}
                    </h3>
                </div>
            </div>

            <div class="card-body border-top p-9 min-h-200px">
                <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                    @if($uploaded_files->isNotEmpty())
                        @foreach($uploaded_files as $uploaded_file)
                            @php /** @var \App\Models\Media $uploaded_file */ @endphp

                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card h-100 bg-light">
                                    <div class="card-body d-flex justify-content-center text-center flex-column my-0">
                                        <div class="text-gray-800 text-hover-primary d-flex flex-column">
                                            <div class="symbol symbol-60px mb-5">
                                                @if($uploaded_file->isImage())
                                                    <img src="{{ $uploaded_file->getUrl() }}" alt="">
                                                @else
                                                    <x-svg icon="file" class="svg-icon-2hx" />
                                                @endif
                                            </div>

                                            <div class="fs-5 fw-bold mb-2">{{ $uploaded_file->name }}</div>
                                        </div>

                                        <div class="fs-7 fw-semibold text-gray-400">
                                            {{ $uploaded_file->getCreatedAtForHumans() }}
                                        </div>
                                    </div>

                                    <div class="card-footer my-0 pt-0">
                                        <div class="d-flex-center-wrap">
                                            <button class="btn btn-sm btn-icon btn-danger me-2" data-bs-toggle="modal"
                                                    data-bs-target="#delete_media_{{ $uploaded_file->id }}">
                                                <x-svg icon="times" />
                                            </button>
                                            <x-livewire.action :with-text="false"
                                                               wire-click="showMedia('{{ $uploaded_file->id }}')"
                                                               class="btn-sm btn-icon btn-primary">
                                                <x-svg icon="download" />
                                            </x-livewire.action>

                                            <x-widgets.modal id="delete_media_{{ $uploaded_file->id }}"
                                                             :title="__('actions.Delete')"
                                                             :subtitle="$uploaded_file->file_name">
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
                                                            wire:click="deleteMedia('{{ $uploaded_file->id }}')"
                                                            data-bs-dismiss="modal">
                                                        {{ __('actions.Delete') }}
                                                    </button>
                                                </x-slot>
                                            </x-widgets.modal>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
    @endpush
</section>
