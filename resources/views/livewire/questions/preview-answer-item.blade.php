@php /** @var \App\Models\Answer $answer */ @endphp
<div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-10 mb-14">
    <div class="text-center flex-shrink-0 me-7 me-lg-13">
        <div class="symbol symbol-70px symbol-circle mb-2">
            <x-widgets.user-logo :user="$answer->user" />
        </div>

        @if($answer->user)
            <div class="mb-0">

                <a href="{{ auth()->user()->isAdmin() ? route('users.edit', ['user' => $answer->user->id]) : 'javascript:void(0);' }}"
                   class="text-gray-700 fw-bold text-hover-primary" @if(auth()->user()->isAdmin()) target="_blank" @endif>
                    {{ $answer->user->firstName() }}
                </a>

                <br>

                @if($answer->hasMedia())
                    <x-tooltip :text="__('titles.Files')">
                        <button data-bs-toggle="modal" data-bs-target="#media_{{ $answer->id }}"
                                class="btn btn-sm btn-icon btn-primary">
                            <x-svg icon="attached" />
                        </button>
                    </x-tooltip>

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
                @endif
            </div>
        @endif
    </div>

    <div class="mb-0 fs-6">
        <div class="text-muted fw-semibold lh-lg mb-2 mh-100px overflow-y-auto">
            {!! $answer->content !!}
        </div>
    </div>
</div>
