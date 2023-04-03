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
                                    <a href="{{ route('users.edit', ['user' => $answer->user->id]) }}"
                                       target="_blank" class="fw-bold text-gray-800 text-hover-primary fs-7">
                                        {{ $answer->user->firstName() }}
                                    </a>
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

                <div class="mb-6 mh-200px overflow-auto">
                    {!! $answer->content !!}
                </div>

                <div class="d-flex-end">
                    <a href="{{ route('answers.edit', ['answer' => $answer->id]) }}"
                       class="btn btn-sm btn-icon btn-primary">
                        <x-svg icon="pencil" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
