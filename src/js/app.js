const bootstrap = require('bootstrap');

document.addEventListener('DOMContentLoaded', () => {
    // Inicialización de la validación de formularios
    initializeFormValidation();
    dialog();
});

// Validación de formularios con Bootstrap
const initializeFormValidation = () => {
    const forms = document.querySelectorAll('.needs-validation');

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
};


window.onload = function () {
    const resultado = new URLSearchParams(window.location.search);
    const msjToast = document.querySelector('.toast-body p');
    const toastEl = document.querySelector('#successToast');
    const toast = new bootstrap.Toast(toastEl);

    function mostrarToast(mensaje) {
        msjToast.textContent = mensaje;
        toast.show();
    }

    const success = resultado.get('success');

    if (success === '1') {
        mostrarToast('Registro creado correctamente.');
    } else if (success === '2') {
        mostrarToast('Registro actualizado correctamente.');
    } else if (success === '3') {
        mostrarToast('Registro eliminado correctamente.');
    }

    // if (resultado.get('success') === 'true') {
    //     const toastEl = document.querySelector('#successToast');
    //     const toast = new bootstrap.Toast(toastEl);
    //     toast.show();
    // }
}

function dialog() {
    const dialog = document.querySelector('dialog.msjEnviado');
    const btnDialog = dialog.querySelector('button');

    if (dialog) {
        document.body.classList.add('no-scroll');
    }

    btnDialog.addEventListener('click', (e) => {
        e.preventDefault();
        dialog.remove();
        document.body.classList.remove('no-scroll');
    });
}