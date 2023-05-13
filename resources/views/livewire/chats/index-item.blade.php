@php /** @var \App\Models\Chat $chat */ @endphp
<div class="d-flex flex-stack py-4">
    <div class="d-flex align-items-center">
        <div class="symbol  symbol-45px symbol-circle "><span
                class="symbol-label  bg-light-danger text-danger fs-6 fw-bolder ">
                {{ $chat->receiver?->getFirstLetter() }}
            </span>
        </div>

        <div class="ms-5">
            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">
                {{ $chat->receiver?->name }}
            </a>
            <div class="fw-semibold text-muted">
                {{ $chat->receiver?->username }}
            </div>
        </div>
    </div>

    @if($messages_count > 0)
        <div class="d-flex flex-column align-items-end ms-2">
            <span class="badge badge-sm badge-circle badge-light-success">
                {{ number_format($messages_count) }}
            </span>
        </div>
    @endif
</div>
