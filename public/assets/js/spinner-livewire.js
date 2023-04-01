const preloader = $("#pre_loader");
$(document).ready(function () {
    try {
        Livewire.hook("message.sent", () => {
            preloader.css("display", "block")
        })

        Livewire.hook("message.processed", () => {
            preloader.css("display", "none")
        })

        Livewire.hook("message.failed", () => {
            preloader.css("display", "none")
        })
    } catch {
        preloader.css("display", "none")
    }
});
