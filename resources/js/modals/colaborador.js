
document.querySelectorAll('.add-colaborador-toggle').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;

        const inputCodigo = document.querySelector('#edit-codigo');
        if (inputCodigo) {
            inputCodigo.value = id;
        }

        const form = document.querySelector('#confirm-toggle form');
        if (form) {
            form.action = `/colaborador/${id}`;
        }

        const modal = document.getElementById('confirm-toggle');
        if (modal) {
            modal.classList.remove('hidden');
        }
    });
});

['close-colaborador-toggle', 'cancel-colaborador-toggle'].forEach(id => {
    const btn = document.getElementById(id);
    if (btn) {
        btn.addEventListener('click', () => {
            const modal = document.getElementById('confirm-toggle');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    }
});
