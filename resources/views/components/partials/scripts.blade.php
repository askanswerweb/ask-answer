@vite(['resources/js/app.js'])
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
@livewireScripts
<script>
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toastr-bottom-center",
        preventDuplicates: false,
        onclick: null,
        showDuration: "1000",
        hideDuration: "8000",
        timeOut: "6000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };

    document.addEventListener('success', (message) => {
        if (!!message.detail)
            toastr.success(message.detail)
    })

    document.addEventListener('error', (message) => {
        if (!!message.detail)
            toastr.error(message.detail)
    })
</script>

@stack('scripts')
