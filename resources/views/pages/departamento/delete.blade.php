<div id="confirm-exclui" class="hidden fixed inset-0 bg-black bg-opacity-20 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-96">
        <h3 class="text-lg font-semibold mb-4">Confirmar Exclusão</h3>
        <p class="mb-4">Tem certeza que deseja excluir esta departamento?</p>

        <form method="POST" action="">
            @csrf
            @method('DELETE')
            <input type="hidden" id="edit-codigo" name="depa_codigo" value="">

            <div class="flex justify-end space-x-3">
                <button type="button" id="cancel-departamento-exclui" class="px-4 py-2 border rounded-lg hover:bg-gray-100">Cancelar</button>
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">Excluir</button>
            </div>
        </form>
    </div>
</div>