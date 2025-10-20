@extends('layouts.app')

@section('extra-scripts')
<script type="module" src="{{Vite::asset('resources/js/modals/maquina.js')}}"></script>
@endsection

@section('title', 'Computadores')

@section('header')
@endsection

@section('content')
<section id="computadores" class="section-content">
    <div class="bg-white rounded-xl shadow-sm p-4 lg:p-8 w-full  text-base lg:text-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Computadores</h2>
            <button id="add-maquina-btn" 
                class="bg-indigo-600 text-white px-6 py-4 text-lg lg:px-3 lg:py-2 lg:text-sm rounded-lg hover:bg-indigo-700 transition flex items-center font-bold">
                <i class="fas fa-desktop mr-2 ml-2"></i> Nova Computador
            </button> 
        </div>

        <div class="w-full overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg overflow-hidden">
                <thead class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider hidden lg:table-cell">Data de coleta</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider">Responsável</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider hidden lg:table-cell">Nome</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider">Marca</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider hidden lg:table-cell">Processador</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider">Ram</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider hidden lg:table-cell">Ativo</th>
                        <th class="px-6 py-3 text-center text-base font-semibold uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($maquina as $maq)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-2 text-center text-gray-600 font-medium hidden lg:table-cell">
                                {{ \Carbon\Carbon::parse($maq->maqu_coleta)->format('d/m/Y h:m:s') }}
                            </td>
                            <td class="px-2 py-2 lg:px-6 text-wrap text-center text-gray-700">{{ $maq->colaborador ? $maq->colaborador->cola_nome : '' }}</td>
                            <td class="px-6 py-2 hidden text-center lg:table-cell">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full">
                                    {{ $maq->maqu_nome }}
                                </span>
                            </td>
                            <td class="px-2 py-2 lg:px-6 text-center">
                                <span class="px-3 py-1 lg:text-xs text-base font-bold rounded-full">
                                    {{ $maq->maqu_marca }}
                                </span>
                            </td>
                            <td class="px-6 py-2 hidden lg:table-cell text-center">
                                <span class="px-6 py-4 text-gray-700 font-bold">
                                    {{ $maq->maqu_processador }}
                                </span>
                            </td>
                            <td class="px-2 py-2 lg:px-6 text-base text-center font-bold">
                               {{ ceil($maq->maqu_ram) }} Mb
                            </td>
                            <td class="px-6 py-2 hidden lg:table-cell text-center">{{ '' }}</td>
                            <td class="px-2 py-2 lg:px-6 flex space-x-2 flex items-center justify-center space-x-2">
                                <button
                                    type="button"
                                    class="edit-maquina-btn px-5 py-3 text-base lg:px-3 lg:py-2 lg:text-sm bg-indigo-500 text-white text-xs rounded-lg hover:bg-indigo-600 transition"
                                    data-id="{{ $maq->maqu_codigo }}"
                                    data-responsavel="{{ $maq->maqu_responsavel }}"
                                    data-nome="{{ $maq->maqu_nome }}"
                                    data-iplocal="{{ $maq->maqu_iplocal }}"
                                    data-ippublico="{{ $maq->maqu_ippublico }}"
                                    data-so="{{ $maq->maqu_so }}"
                                    data-versaoso="{{ $maq->maqu_versaoso }}"
                                    data-arquitetura="{{ $maq->maqu_arquitetura }}"
                                    data-processador="{{ $maq->maqu_processador }}"
                                    data-cores="{{ $maq->maqu_cores }}"
                                    data-threads="{{ $maq->maqu_threads }}"
                                    data-ram="{{ $maq->maqu_ram }}"
                                    data-usocpu="{{ $maq->maqu_usocpu }}"
                                    data-usoram="{{ $maq->maqu_usoram }}"
                                    data-coleta="{{ $maq->maqu_coleta }}"
                                    data-marca="{{ $maq->maqu_marca }}"
                                    data-modelo="{{ $maq->maqu_modelo }}"
                                >
                                    Editar
                                </button>
                                <button type="button" class="add-maquina-exclui px-5 py-3 text-base lg:px-3 lg:py-2 lg:text-sm border rounded-lg bg-red-600 text-gray-100 hover:bg-red-700"
                                data-id="{{ $maq->maqu_codigo }}"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500 italic">
                                Nenhum movimento encontrado
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@include('pages.modals.maquina.add')
@include('pages.modals.maquina.edit')
@endsection
