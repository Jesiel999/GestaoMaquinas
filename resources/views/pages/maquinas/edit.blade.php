@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{Vite::asset('resources/js/modals/maquina.js')}}"></script>
@endsection

@section('title', 'Computadores')

@section('header')
@endsection

@section('content')
<section id="computadores" class="section-content">

<h2 class="text-2xl font-bold mb-4 text-center">Editar Máquina</h2>

<form id="form-edit" method="POST" 
        action="{{ route('updateMaquina', ['maqu_codigo' => $maquina->maqu_codigo]) }}">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Responsável</label>
                <select name="maqu_responsavel" class="border rounded-lg px-3 py-2 w-full">
                    <option value="">Selecione um colaborador</option>
                    @foreach ($colaboradores as $colaborador)
                        <option value="{{ $colaborador->cola_codigo }}"
                            {{ $maquina->maqu_responsavel == $colaborador->cola_codigo ? 'selected' : '' }}>
                            {{ $colaborador->cola_nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Nome</label>
                <input type="text" name="maqu_nome" 
                    value="{{ $maquina->maqu_nome }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div>
            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">IP Local</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_iplocal }}</p>
            </div>

            <div class="mt-2">
                <label class="block text-sm font-medium text-gray-700">IP Público</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_ippublico }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Sistema Operacional</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_so }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Versão SO</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_versaoso }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Arquitetura</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_arquitetura }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Processador</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_processador }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Cores</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_cores }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Threads</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_threads }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Memória RAM</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_ram }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Uso CPU</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_usocpu }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Uso RAM</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_usoram }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Data da Coleta</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_coleta }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Marca</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_marca }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Modelo</label>
                <p class="border rounded-lg w-full py-2 px-3 text-gray-700 bg-gray-100">{{ $maquina->maqu_modelo }}</p>
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
