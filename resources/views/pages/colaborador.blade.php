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
                <i class="fas fa-desktop mr-2 ml-2"></i> Nova Colaborador
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
                        <button 
                            type="button" 
                            class="colaborador-exclui p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition"
                            data-id="{{ $col->cola_codigo }}"
                        >
                            <i class="fas fa-trash text-sm"></i>
                        </button>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-6 text-gray-500 italic">
                    Nenhum colaborador encontrado
                </div>
            @endforelse
        </div>

</section>
@endsection
