@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{Vite::asset('resources/js/modals/colaborador.js')}}"></script>
@endsection

@section('title', 'Colaborador')

@section('header')
@endsection

@section('content')
<section id="colaboradores" class="section-content">
    <div class="bg-white rounded-xl shadow-sm p-4 lg:p-8 w-full  text-base lg:text-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Colaboradores</h2>
            <a id="add-maquina-btn" href="{{ route('cadColaborador') }}"
                class="bg-indigo-600 text-white px-6 py-4 text-lg lg:px-3 lg:py-2 lg:text-sm rounded-lg hover:bg-indigo-700 transition flex items-center font-bold">
                <i class="fas fa-add mr-2 ml-2"></i> Novo Colaborador
            </a> 
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @forelse($colaborador as $col)
                <div class="bg-gray-100 rounded-xl p-4 shadow-sm flex flex-col justify-between space-y-2">
                    <div>
                        <h3 class="font-semibold text-gray-800 text-base md:text-lg truncate">
                            {{ $col->cola_nome }}
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">
                            <strong>CPF:</strong> {{ $col->cola_cpf }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>Telefone:</strong> {{ $col->cola_telefone }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>E-mail:</strong> {{ $col->cola_email }}
                        </p>
                        <p class="text-sm text-gray-600">
                            <strong>Departamento:</strong> {{ $col->departamento->depa_nome ?? '—' }}
                        </p>
                    </div>

                    <div class="flex space-x-2 pt-2">
                        <a
                            href="{{ route('editColaborador', ['cola_codigo' => $col->cola_codigo]) }}"
                            class="p-2 bg-indigo-500 text-white rounded-full hover:bg-indigo-600 transition"
                        >
                            <i class="fas fa-pen text-sm"></i>
                        </a>

                        @if ($col->cola_ativo == 1)
                            <button 
                                type="button" 
                                class="add-colaborador-toggle p-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition"
                                data-id="{{ $col->cola_codigo }}"
                                title="Inativar Colaborador"
                            >
                                <i class="fas fa-user-slash text-sm"></i>
                            </button>
                        @else
                            <button 
                                type="button" 
                                class="add-colaborador-toggle p-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition"
                                data-id="{{ $col->cola_codigo }}"
                                title="Ativar Colaborador"
                            >
                                <i class="fas fa-user-check text-sm"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-6 text-gray-500 italic">
                    Nenhum colaborador encontrado
                </div>
            @endforelse
        </div>
        <div class="flex justify-end mb-6">
            <form method="GET" action="{{ route('colaborador') }}">
                <select name="status" id="status-filter"
                    class="border rounded-lg py-2 px-3 text-gray-700 focus:ring-2 focus:ring-indigo-500"
                    onchange="this.form.submit()">
                    <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Ativos</option>
                    <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inativos</option>
                    <option value="todos">Todos</option>
                </select>
            </form>
        </div>
</section>
@include('pages.colaborador.inativa')
@include('pages.colaborador.ativar')
@endsection
