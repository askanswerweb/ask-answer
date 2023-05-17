<div class="d-flex flex-column flex-center flex-column-fluid">
    <div class="d-flex justify-content-center flex-column-fluid flex-column px-5">
        <div class="form w-100">
            <div class="card-body">
                <div class="w-sm-700px bg-body rounded shadow-sm p-10 mx-auto">
                    <div class="text-center mb-5">
                        <img src="{{ asset('assets/media/logos/business-logo.png') }}" class="img-fluid"
                             alt="{{ __('auth.Signup') }}" loading="lazy">
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-bolder text-dark" for="name">
                                {{__('titles.Name')}}
                            </label>
                        </div>

                        <div class="col-md-8">
                            <input
                                class="form-control form-control-solid @error('user.name') is-invalid @enderror"
                                type="text"
                                id="name"
                                autocomplete="off"
                                placeholder="{{__('titles.Name')}}"
                                wire:model.defer="user.name"
                            />

                            <x-error error="user.name" />
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-bolder text-dark" for="username">
                                {{__('titles.Username')}}
                            </label>
                        </div>

                        <div class="col-md-8">
                            <input
                                class="form-control form-control-solid @error('user.username') is-invalid @enderror"
                                type="text"
                                id="username"
                                autocomplete="off"
                                placeholder="{{__('titles.Username')}}"
                                wire:model.defer="user.username"
                            />

                            <x-error error="user.username" />
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-bolder text-dark" for="branch_id">
                                {{__('titles.Branch')}}
                            </label>
                        </div>
                        <div class="col-md-8">
                            <x-filters.select2
                                id="branch_id"
                                model="branch_id"
                                url="guest/branches"
                                :title="__('titles.Branch')"
                                :clear="false"
                            />

                            <x-error error="password_confirmation" />
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-bolder text-dark" for="password">
                                {{__('titles.Password')}}
                            </label>
                        </div>

                        <div class="col-md-8">
                            <input
                                class="form-control form-control-solid @error('password') is-invalid @enderror"
                                type="password"
                                id="password"
                                autocomplete="off"
                                placeholder="{{__('titles.Password')}}"
                                wire:model.defer="password"
                            />

                            <x-error error="password" />
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-md-4">
                            <label class="form-label fs-6 fw-bolder text-dark" for="password_confirmation">
                                {{__('titles.ConfirmPassword')}}
                            </label>
                        </div>
                        <div class="col-md-8">
                            <input
                                class="form-control form-control-solid"
                                type="password"
                                id="password_confirmation"
                                autocomplete="off"
                                placeholder="{{__('titles.ConfirmPassword')}}"
                                wire:model.defer="password_confirmation"
                            />

                            <x-error error="password_confirmation" />
                        </div>
                    </div>

                    <div class="text-center mb-5">
                        <x-livewire.action wire-click="register" class="btn-primary" id="register">
                            {{__('auth.Signup')}}
                        </x-livewire.action>
                    </div>

                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        {{ __('titles.HaveAccount') }}

                        <a href="{{ route('login') }}" class="link-primary" >
                            {{ __('auth.Signin') }}
                        </a>
                    </div>

                    <x-partials.auth-footer />
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.addEventListener('disable', () => {
                    document.getElementById('register').disabled = true
                })
            })
        </script>
    @endpush
</div>
