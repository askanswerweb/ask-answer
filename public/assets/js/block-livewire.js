const container = document.querySelector('#livewire-container')

const blockUI = new KTBlockUI(container, {
    message: `<div class="blockui-message"><span class="spinner-border text-primary"></span> Loading...</div>`,
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
