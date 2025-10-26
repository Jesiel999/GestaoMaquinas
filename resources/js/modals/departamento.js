
document.querySelectorAll('.add-departamento-exclui').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;

        const inputCodigo = document.querySelector('#edit-codigo');
        if (inputCodigo) {
            inputCodigo.value = id;
        }

        const form = document.querySelector('#confirm-exclui form');
        if (form) {
            form.action = `/departamento/${id}`;
        }

        const modal = document.getElementById('confirm-exclui');
        if (modal) {
            modal.classList.remove('hidden');
        }
    });
});

['close-departamento-exclui', 'cancel-departamento-exclui'].forEach(id => {
    const btn = document.getElementById(id);
    if (btn) {
        btn.addEventListener('click', () => {
            const modal = document.getElementById('confirm-exclui');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    }
});
