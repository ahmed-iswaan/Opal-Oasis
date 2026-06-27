import Swal from 'sweetalert2';

// Expose for inline/debug usage if needed.
window.Swal = Swal;

// Livewire v3/v4 browser event listener.
document.addEventListener('livewire:init', () => {
    Livewire.on('notify', ({ message, type = 'success', title }) => {
        Swal.fire({
            icon: type,
            title: title ?? (type === 'success' ? 'Success' : ''),
            text: message,
            timer: 1800,
            showConfirmButton: false,
            toast: true,
            position: 'top-end',
        });
    });
});
