@extends('layouts.app')

@section('extra-scripts')
@endsection

@section('title', 'Editar Departamento')

@section('content')
<section id="colaboradores" class="section-content">

    <h2 class="text-2xl font-bold mb-4 text-center">Editar Departamento</h2>

    <form id="form-edit" method="POST" action="{{ route('updateDepartamento', $departamento->depa_codigo) }}">
        @csrf
        @method('PUT')

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Nome</label>
                <input type="text" name="depa_nome"
                    value="{{ old('depa_nome', $departamento->depa_nome) }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ex: João da Silva">
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('departamento') }}"
                class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancelar
            </a>
            <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
                Atualizar
            </button>
        </div>
    </form>
</section>
@endsection
