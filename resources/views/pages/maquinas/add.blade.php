@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{ Vite::asset('resources/js/modals/maquina.js') }}"></script>
@endsection

@section('title', 'Cadastrar Máquina')

@section('content')
<section id="computadores" class="section-content">

    <h2 class="text-2xl font-bold mb-4 text-center">Cadastrar Máquina</h2>

    <form id="form-create" method="POST" action="{{ route('cadastroMaquina') }}">
        @csrf

        <div class="grid gap-6">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mt-2">Responsável</label>
                    <select name="maqu_responsavel" class="border rounded-lg px-3 py-2 w-full">
                        <option value="">Selecione um colaborador</option>
                        @foreach ($colaboradores as $colaborador)
                            <option value="{{ $colaborador->cola_codigo }}">
                                {{ $colaborador->cola_nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mt-2">Nome da Máquina</label>
                    <input type="text" name="maqu_nome"
                        value="{{ old('maqu_nome') }}"
                        class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                        placeholder="Ex: Servidor Principal">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mt-2">Marca</label>
                    <input type="text" name="maqu_marca"
                        value="{{ old('maqu_marca') }}"
                        class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                        placeholder="Ex: Dell">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mt-2">Modelo</label>
                    <input type="text" name="maqu_modelo"
                        value="{{ old('maqu_modelo') }}"
                        class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                        placeholder="Ex: Optiplex 7080">
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('maquina') }}"
                class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancelar
            </a>
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Salvar
            </button>
        </div>
    </form>
</section>
@endsection
