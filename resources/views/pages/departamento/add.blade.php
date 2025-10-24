@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{ Vite::asset('resources/js/modals/departamento.js') }}"></script>
@endsection

@section('title', 'Cadastrar Departamento')

@section('content')
<section id="departamentos" class="section-content">

    <h2 class="text-2xl font-bold mb-4 text-center">Cadastrar Departamento</h2>

    <form id="form-create" method="POST" action="{{ route('cadastroDepartamento') }}">
        @csrf

        <div class="grid gap-6">
            <div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mt-2">Nome do Departamento</label>
                    <input type="text" name="depa_nome"
                        value="{{ old('depa_nome') }}"
                        class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                        placeholder="Ex: Financeiro, RH, Tecnologia">
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('departamento') }}"
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
