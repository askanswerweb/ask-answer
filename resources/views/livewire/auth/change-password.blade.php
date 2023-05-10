<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">
                {{ __('passwords.SetupNewPassword') }}
            </h3>
        </div>
    </div>

    <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="current_password">
                    {{ __('passwords.CurrentPassword') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="current_password" placeholder="{{ __('passwords.CurrentPassword') }}" autocomplete="off"
                        wire:model.defer="current_password" type="password" class="form-control form-control-solid"
                    />

                    @error('current_password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="password">
                    {{ __('passwords.NewPassword') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="password" placeholder="{{ __('passwords.NewPassword') }}" autocomplete="off"
                        wire:model.defer="password" type="password" class="form-control form-control-solid"
                    />

                    @error('password')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="password_confirmation">
                    {{ __('passwords.ConfirmNewPassword') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="password_confirmation" placeholder="{{ __('passwords.ConfirmNewPassword') }}" autocomplete="off"
                        wire:model.defer="password_confirmation" type="password" class="form-control form-control-solid"
                    />

                    @error('password_confirmation')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <a href="{{ route('users.index') }}" class="btn btn-light btn-active-light-primary me-2"
           wire:loading.remove wire:target="save">
            {{ __('actions.Back') }}
        </a>
        <x-livewire.action wire-click="save" class="btn-primary">
            {{ __('actions.Save') }}
        </x-livewire.action>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/spinner-livewire.js') }}"></script>
    @endpush
</div>
