import Alpine from 'alpinejs';

window.Alpine = Alpine;
window.confirmAction = function confirmAction(message) {
    if (confirm(message)) {
        return true;
    }
    return false;
}

Alpine.start();



