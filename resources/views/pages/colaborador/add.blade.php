@extends('layouts.app')

@section('title', 'Cadastrar Colaborador')

@section('content')
<section id="colaboradores" class="section-content">

    <h2 class="text-2xl font-bold mb-4 text-center">Cadastrar Colaborador</h2>

    <form id="form-create" method="POST" action="{{ route('cadastroColaborador') }}">
        @csrf

        <div class="grid gap-6 md:grid-cols-2">
            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Nome</label>
                <input type="text" name="cola_nome"
                    value="{{ old('cola_nome') }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ex: João da Silva">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">CPF</label>
                <input type="text" name="cola_cpf"
                    value="{{ old('cola_cpf') }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    placeholder="Somente números">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">Telefone</label>
                <input type="text" name="cola_telefone"
                    value="{{ old('cola_telefone') }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    placeholder="(XX) XXXXX-XXXX">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mt-2">E-mail</label>
                <input type="email" name="cola_email"
                    value="{{ old('cola_email') }}"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    placeholder="exemplo@email.com">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mt-2">Departamento</label>
                <select name="cola_departamento"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500">
                    <option value="">Selecione um departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->depa_codigo }}" {{ old('cola_departamento') == $departamento->depa_codigo ? 'selected' : '' }}>
                            {{ $departamento->depa_nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mt-2">Ativo</label>
                <select name="cola_ativo"
                    class="border rounded-lg w-full py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500">
                    <option value="">Selecione um Ativo/Inativo</option>
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('colaborador') }}"
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
