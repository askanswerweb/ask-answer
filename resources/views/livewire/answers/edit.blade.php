@php /** @var \App\Models\Answer $answer */ @endphp
<section>
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">
                    {{ __('titles.Answer') }}
                </h3>
            </div>
        </div>

        <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
            <div class="card-body border-top p-9">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-semibold fs-6" for="content">
                        {{ __('titles.Content') }}
                    </label>

                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <textarea
                        id="content"
                        wire:model.defer="answer.content"
                        type="text"
                        class="form-control form-control-solid resize-none"
                        placeholder="{{ __('titles.Content') }}"
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
            @if($answer->question)
                <a href="{{ route('questions.answers', ['question' => $answer->question->id]) }}"
                   class="btn btn-light btn-active-light-primary me-2"
                   wire:loading.remove wire:target="save">
                    {{ __('actions.Back') }}
                </a>
            @endif

            @if(auth()->user()->isAdmin())
                <x-livewire.action wire-click="save" class="btn-primary">
                    {{ __('actions.Save') }}
                </x-livewire.action>
            @endif
        </div>
    </div>

    @if($answer->exists)
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0">
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">
                        {{ __('titles.Files') }}
                    </h3>
                </div>
            </div>

            <div class="card-body border-top p-9 min-h-200px">
                @livewire('media.index', ['model' => $answer])
            </div>
        </div>
    @endif

    @push('scripts')
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
    @endpush
</section>
