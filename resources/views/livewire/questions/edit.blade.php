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
</section>
