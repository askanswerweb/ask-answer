@php /** @var \App\Models\Answer $answer */ @endphp
<div class="col-lg-4">
    <div class="card card-flush h-xl-100">
        <div class="card-body py-9">
            <div class="d-flex flex-column h-100">
                <div class="mb-7">
                    <div class="d-flex flex-stack mb-6">
                        <div class="flex-shrink-0 me-5">
                            <span class="text-gray-400 fs-7 fw-bold me-2 d-block lh-1 pb-1">
                                {{ $answer->getCreatedAtForHumans() }}
                            </span>

                            <span class="text-gray-800 fs-1 fw-bold">
                                {{ __('titles.Answer') }} #{{ $answer->id }}
                            </span>
                        </div>
                    </div>

                    <div class="d-flex align-items-center flex-wrap d-grid gap-2">
                        <div class="d-flex align-items-center me-5 me-xl-13">
                            <div class="symbol symbol-30px symbol-circle me-3">
                                <x-svg icon="user" class="symbol-label bg-light" />
                            </div>

                            @if($answer->user)
                                <div class="m-0">
                                    <label class="fw-semibold text-gray-400 d-block fs-8">
                                        {{ __('titles.User') }}
                                    </label>
                                    @if(auth()->user()->isAdmin())
                                        <a href="{{ route('users.edit', ['user' => $answer->user->id]) }}"
                                           target="_blank" class="fw-bold text-gray-800 text-hover-primary fs-7">
                                            {{ $answer->user->firstName() }}
                                        </a>
                                    @else
                                        <label class="fw-bold text-gray-800 text-hover-primary fs-7">
                                            {{ $answer->user->firstName() }}
                                        </label>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="symbol symbol-30px symbol-circle me-3">
                                <x-svg icon="rock" class="symbol-label bg-primary svg-icon-white" />
                            </div>

                            <div class="m-0">
                                <label class="fw-semibold text-gray-400 d-block fs-8">
                                    {{ __('titles.Files') }}
                                </label>
                                <span class="fw-bold text-gray-800 fs-7">
                                    {{ number_format($media_count) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-6 mh-200px overflow-y-auto pre-wrap">
                    {!! $answer->content !!}
                </div>

                <div class="d-flex-end">
                    <button
                            class="btn btn-sm btn-icon btn-light me-2">
                        <x-svg icon="attached" />
                    </button>

                    <button data-bs-toggle="modal" data-bs-target="#edit_{{ $answer->id }}"
                            class="btn btn-sm btn-icon btn-primary">
                        <x-svg icon="pencil" />
                    </button>

                    <x-widgets.modal id="edit_{{ $answer->id }}" :title="__('actions.Edit')"
                                     subtitle="{{ __('titles.Answer') }} #{{ $answer->id }}">
                        <div class="w-100 text-start">
                            <label class="form-label required" for="content_{{ $answer->id }}">
                                {{ __('titles.Answer') }}
                            </label>
                            <textarea
                                id="content_{{ $answer->id }}"
                                wire:model.defer="answer.content"
                                type="text"
                                class="form-control form-control-solid resize-none @error('answer.content') is-invalid @enderror"
                                placeholder="{{ __('titles.Answer') }}"
                                autocomplete="off"
                                rows="10"
                                data-kt-autosize="true"
                            ></textarea>
                            @error('answer.content')
                            <div class="fv-plugins-message-container invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <x-slot name="footer">
                            <button class="btn btn-light" data-bs-dismiss="modal">
                                {{ __('actions.Cancel') }}
                            </button>
                            <button class="btn btn-primary" wire:click="save">
                                {{ __('actions.Close') }}
                            </button>
                        </x-slot>
                    </x-widgets.modal>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.addEventListener('saved_content_{{ $answer->id }}', () => {
                    $('#edit_{{ $answer->id }}').modal('hide')
                })
            })
        </script>
    @endpush
</div>
