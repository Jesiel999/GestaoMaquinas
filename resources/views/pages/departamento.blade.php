@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{Vite::asset('resources/js/modals/colaborador.js')}}"></script>
@endsection

@section('title', 'Colaborador')

@section('header')
@endsection

@section('content')
<section id="departamento" class="section-content">
    <div class="bg-white rounded-xl shadow-sm p-4 lg:p-8 w-full  text-base lg:text-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Departamento</h2>
            <a id="add-maquina-btn" href="{{ route('cadDepartamento') }}"
                class="bg-indigo-600 text-white px-6 py-4 text-lg lg:px-3 lg:py-2 lg:text-sm rounded-lg hover:bg-indigo-700 transition flex items-center font-bold">
                <i class="fas fa-desktop mr-2 ml-2"></i> Nova Departamento
            </a> 
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @forelse($departamento as $dep)
                <div class="bg-gray-100 rounded-xl p-3 md:p-4 shadow-sm flex items-center justify-between">
                    <div class="flex-1">
                        <h3 class="font-medium truncate text-sm md:text-base">{{ $dep->depa_nome }}</h3>
                    </div>
                    <div class="flex space-x-2">
                        <button type="button"
                            class="categoria-edit p-2 bg-white border rounded-full hover:bg-gray-200">
                            <i class="fas fa-pen text-sm md:text-base"></i>
                        </button>
                        <button type="button"
                            class="categoria-exclui p-2 bg-white border rounded-full hover:bg-gray-200"
                            data-id="{{ $dep->depa_codigo }}">
                            <i class="fas fa-trash text-sm md:text-base"></i>
                        </button>
                    </div>
                </div>
            @empty
            <div class="col-span-full text-center py-6 text-gray-500 italic">
                Nenhuma departamento encontrada
            </div> 
            @endforelse
        </div>
    </div>
</section>
@endsection
