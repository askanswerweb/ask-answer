<x-layouts.auth>
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex justify-content-center flex-column-fluid flex-column px-5">
            <form class="form w-100" novalidate="novalidate" method="post"
                  action="{{ route('login.post') }}">
                @csrf
                <div class="card-body">
                    <div class="w-sm-500px bg-body rounded shadow-sm p-10 mx-auto">
                        <div class="text-center mb-10">
                            <img src="{{ asset('assets/media/logos/business-logo.png') }}" class="img-fluid"
                                 alt="{{ __('auth.Signin') }}" loading="lazy">
                        </div>

                        @if(session()->has('error'))
                            <div class="alert alert-primary d-flex align-items-center p-5 mb-10">
                                <x-svg icon="warning" class="svg-icon-2hx svg-icon-danger me-4" />
                                <div class="d-flex flex-column">
                                    <h4 class="mb-1 text-danger">{{ __('titles.Error') }}</h4>
                                    <span>{{ session()->get('error') }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark" for="username">
                                {{__('titles.Username')}}
                            </label>
                            <input
                                class="form-control form-control-solid form-control-lg @error('username') is-invalid @enderror"
                                type="text"
                                name="username"
                                id="username"
                                autocomplete="off"
                                value="{{ old('username') }}"
                                placeholder="{{__('titles.Username')}}"
                            />
                            @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark" for="password">
                                {{__('titles.Password')}}
                            </label>
                            <input
                                class="form-control form-control-solid form-control-lg @error('password') is-invalid @enderror"
                                type="password"
                                name="password"
                                id="password"
                                autocomplete="off"
                                placeholder="{{__('titles.Password')}}"
                            />
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                {{__('auth.Signin')}}
                            </button>
                        </div>

                        <x-partials.auth-footer />
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.auth>
