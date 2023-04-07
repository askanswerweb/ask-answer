<div class="card mb-5 mb-xl-10">
    <div class="card-header border-0">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">
                {{ __('titles.CreateUser') }}
            </h3>
        </div>
    </div>

    <div class="form fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="card-body border-top p-9">
            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="name">
                    {{ __('titles.Name') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="name" placeholder="{{ __('titles.Name') }}"
                        wire:model.defer="user.name" type="text" class="form-control form-control-solid"
                    />

                    @error('user.name')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="username">
                    {{ __('titles.Username') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="name" placeholder="{{ __('titles.Username') }}"
                        wire:model.defer="user.username" type="text" class="form-control form-control-solid"
                    />

                    @error('user.username')
                    <div class="fv-plugins-message-container invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row mb-6">
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="password">
                    {{ __('titles.Password') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <input
                        id="name" placeholder="{{ __('titles.Password') }}"
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
                <label class="col-lg-4 col-form-label required fw-semibold fs-6" for="status">
                    {{ __('titles.Status') }}
                </label>

                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                    <x-filters.user-status model="user.status" />

                    @error('user.status')
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
</div>
