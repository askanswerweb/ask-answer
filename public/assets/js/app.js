const arrayColumn = (list, col) => list.map(item => item[col]);

document.addEventListener("DOMContentLoaded", () => {
    try {
        Livewire.hook("message.processed", () => {
            KTMenu.createInstances();
            $('[data-bs-toggle="tooltip"]').tooltip()
        })
        Livewire.hook("message.failed", () => {
            KTMenu.createInstances();
            $('[data-bs-toggle="tooltip"]').tooltip()
        })
    } catch {
    }
})
