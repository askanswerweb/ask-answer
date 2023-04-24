@php /** @var \App\Models\Answer $answer */ @endphp
<div class="col-lg-4">
    <div class="card card-flush h-xl-100">
        <div class="card-body py-9">
            <div class="d-flex flex-column">
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
            </div>
        </div>

        <div class="card-footer pt-0 mt-0 d-flex-end">
            @if($media_count > 0)
                <button data-bs-toggle="modal" data-bs-target="#media_{{ $answer->id }}"
                        class="btn btn-sm btn-icon btn-light me-2">
                    <x-svg icon="attached" />
                </button>
            @endif

            @if($answer->isForAuth())
                <a href="{{ route('answers.edit', ['answer' => $answer->id]) }}"
                   class="btn btn-sm btn-icon btn-primary">
                    <x-svg icon="pencil" />
                </a>
            @endif

            <x-widgets.modal
                class="modal-lg"
                id="media_{{ $answer->id }}" :title="__('titles.Files')"
                subtitle="{{ __('titles.Answer') }} #{{ $answer->id }}">

                <div class="row">
                    @foreach($answer->getMedia() as $media)
                        @livewire('media.index-item', ['media' => $media, 'show' => true], key("media_" . microtime() . "_" . $media->id))
                    @endforeach
                </div>
            </x-widgets.modal>
        </div>
    </div>
</div>
