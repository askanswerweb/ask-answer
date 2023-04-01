<span
    id="{{ $id }}"
    {{ $attributes->merge(['class' => ""]) }}
    data-bs-toggle="tooltip"
    data-bs-custom-class="{{ $customClass }}"
    data-bs-placement="{{ $placement }}"
    title="{{ $text }}">
    {{ $slot }}
</span>

@push('scripts')
    <script>
        Livewire.hook("message.processed", () => {
            $('#{{ $id }}').tooltip()
        })

        Livewire.hook("message.failed", () => {
            $('#{{ $id }}').tooltip()
        })
    </script>
@endpush
