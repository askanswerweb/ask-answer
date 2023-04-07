@php /** @var \App\Models\Answer $answer */ @endphp
<div class="d-flex align-items-center border-1 border-dashed card-rounded p-5 p-lg-10 mb-14">
    <div class="text-center flex-shrink-0 me-7 me-lg-13">
        <div class="symbol symbol-70px symbol-circle mb-2">
            <x-widgets.user-logo :user="$answer->user" />
        </div>

        @if($answer->user)
            <div class="mb-0">

                <a href="{{ auth()->user()->isAdmin() ? route('users.edit', ['user' => $answer->user->id]) : 'javascript:void(0);' }}"
                   class="text-gray-700 fw-bold text-hover-primary" target="_blank">
                    {{ $answer->user->firstName() }}
                </a>

                @if($answer->hasMedia())
                    <span class="text-gray-400 fs-7 fw-semibold d-block mt-1">
                        <x-livewire.action wire-click="download" :with-text="false" class="pm-0">
                            <x-svg icon="download" />
                        </x-livewire.action>
                    </span>
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
