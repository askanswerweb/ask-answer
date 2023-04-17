class LivewireBlockUI {
    constructor(selector) {
        const target = document.querySelector(selector);
        const blockUI = new KTBlockUI(target, {
            message: `<div class="blockui-message bg-body"><span class="spinner-border text-primary"></span> Loading...</div>`,
            overlayClass: "bg-dark bg-opacity-10",
        });

        Livewire.hook("message.sent", () => {
            blockUI.block();
        })

        Livewire.hook("message.processed", () => {
            blockUI.release();
        })

        Livewire.hook("message.failed", () => {
            blockUI.release();
        })
    }
}
