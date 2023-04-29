<x-layouts.auth>
    <div class="d-flex flex-column flex-center flex-column-fluid">
        <div class="d-flex justify-content-center flex-column-fluid flex-column px-5">
            <form class="form w-100" novalidate="novalidate" method="post" id="kt_sign_in_form"
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

                        <div class="text-center mb-5">
                            <button id="kt_sign_in_submit" class="btn btn-primary me-2 flex-shrink-0">
                                <label class="indicator-label cursor-pointer" data-kt-translate="sign-in-submit">
                                    {{__('auth.Signin')}}
                                </label>
                                <label class="indicator-progress">
                                    <span data-kt-translate="general-progress">{{ __('actions.PleaseWait') }}</span>
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </label>
                            </button>
                        </div>

                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            {{ __('titles.NotMemberYet') }}

                            <a href="{{ route('register') }}" class="link-primary">
                                {{ __('auth.Signup') }}
                            </a>
                        </div>

                        <x-partials.auth-footer />
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/custom/authentication/sign-in/general.js') }}"></script>
    @endpush
</x-layouts.auth>
