<div id="confirm-toggle" class="hidden fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96 relative">
        <h3 class="text-lg font-semibold mb-4">Confirmar Ativar</h3>
        <p class="mb-4 text-gray-600">Tem certeza que deseja ativar este colaborador?</p>

        <form method="POST" action="">
            @csrf

            <div class="flex justify-end space-x-3">
                <button type="button" id="cancel-colaborador-toggle"
                    class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                    Cancelar
                </button>

                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Confirmar
                </button>
            </div>
        </form>

        <button type="button" id="close-colaborador-toggle"
            class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
            ✕
        </button>
    </div>
</div>
