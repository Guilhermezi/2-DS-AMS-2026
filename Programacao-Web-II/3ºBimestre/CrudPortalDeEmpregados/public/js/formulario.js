document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form.needs-validation');

    forms.forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
                form.classList.add('was-validated');
            }
        });
    });

    const modalExcluir = document.getElementById('modalExcluir');
    if (modalExcluir) {
        const botaoConfirmar = document.getElementById('confirmarExcluir');
        const botoesExcluir = document.querySelectorAll('[data-bs-target="#modalExcluir"]');

        botoesExcluir.forEach(function (botao) {
            botao.addEventListener('click', function () {
                botaoConfirmar.setAttribute('href', botao.getAttribute('data-delete-url'));
            });
        });
    }
});