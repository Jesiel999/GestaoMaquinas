/* Janela de Cadastro */
document.getElementById('add-maquina-btn').addEventListener('click', function() {
    document.getElementById('maquina-modal').classList.remove('hidden');
});
document.getElementById('close-maquina-modal').addEventListener('click', function() {
    document.getElementById('maquina-modal').classList.add('hidden');
});
document.getElementById('cancel-maquina').addEventListener('click', function() {
    document.getElementById('maquina-modal').classList.add('hidden');
});

/* Janela de Editar */  
document.querySelectorAll('.edit-maquina-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        
        document.querySelector('#maquina-edit input[name="maqu_codigo"]').value = this.dataset.id;
        document.querySelector('#maquina-edit input[name="maqu_responsavel"]').value = this.dataset.responsavel;
        document.querySelector('#maquina-edit input[name="maqu_nome"]').value = this.dataset.nome;
        document.querySelector('#maquina-edit input[name="maqu_iplocal"]').value = this.dataset.iplocal;
        document.querySelector('#maquina-edit select[name="maqu_ippublico"]').value = this.dataset.ippublico;
        document.querySelector('#maquina-edit select[name="maqu_so"]').value = this.dataset.so;
        document.querySelector('#maquina-edit input[name="maqu_versaoso"]').value = this.dataset.versaoso;
        document.querySelector('#maquina-edit input[name="maqu_arquitetura"]').value = this.dataset.arquitetura;
        document.querySelector('#maquina-edit select[name="maqu_processador"]').value = this.dataset.processador;
        document.querySelector('#maquina-edit select[name="maqu_cores"]').value = this.dataset.cores;
        document.querySelector('#maquina-edit textarea[name="maqu_threads"]').value = this.dataset.threads;
        document.querySelector('#maquina-edit select[name="maqu_ram"]').value = this.dataset.ram;
        document.querySelector('#maquina-edit select["maqu_usocpu"]').value = this.dataset.usocpu;
        document.querySelector('#maquina-edit select["maqu_usoram"]').value = this.dataset.usoram;
        document.querySelector('#maquina-edit select["maqu_coleta"]').value = this.dataset.coleta;
        document.querySelector('#maquina-edit select["maqu_marca"]').value = this.dataset.marca;
        document.querySelector('#maquina-edit select["maqu_modelo"]').value = this.dataset.modelo;

        document.querySelector('#maquina-edit form').action = `/maquina/${this.dataset.id}`;

        document.getElementById('maquina-edit').classList.remove('hidden');
    });
});

document.getElementById('close-maquina-edit').addEventListener('click', function() {
    document.getElementById('maquina-edit').classList.add('hidden');
});
document.getElementById('cancel-maquina-edit').addEventListener('click', function() {
    document.getElementById('maquina-edit').classList.add('hidden');
});

/* Janela Exclui */
document.querySelectorAll('.add-maquina-exclui').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;

        document.querySelector('#edit-codigo').value = id;
        
        document.querySelector('#confirm-exclui form').action = `/extrato/${id}`;

        document.getElementById('confirm-exclui').classList.remove('hidden');
    });
});
document.getElementById('close-maquina-exclui').addEventListener('click', function() {
    document.getElementById('confirm-exclui').classList.add('hidden');
});
document.getElementById('cancel-maquina-exclui').addEventListener('click', function() {
    document.getElementById('confirm-exclui').classList.add('hidden');
});
  