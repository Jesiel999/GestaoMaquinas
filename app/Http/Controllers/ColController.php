<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColController extends Controller
{
    // Exibir
    public function exibir(Request $request)
    {
        $status = $request->input('status', '1'); 

        $query = Colaborador::query();

        if ($status !== 'todos') {
            $query->where('cola_ativo', $status);
        }

        $colaborador = $query->orderBy('cola_codigo', 'asc')->get();

        return view('pages.colaborador', compact('colaborador', 'status'));
    }


    // Retorna tela de cadastro
    public function cad(Colaborador $colaborador){

        $query = Colaborador::query();
        
        $colaborador = $query->orderBy('cola_codigo','desc')->get();

        $departamentos = Departamento::orderBy('depa_codigo','desc')->get();
        
        return view ('pages.colaborador.add', compact('colaborador','departamentos'));
    }
    
    // Cadastro
    public function store(ColRequest $request){
        $colaborador = Colaborador::create($request->validated());

        return redirect()
            ->route('colaborador')
            ->with('success','Colaborador cadastrado com sucesso!');
    }

    // Retorna tela editar
    public function edit(Request $request, $depa_codigo){

        $colaborador = Colaborador::findOrFail($depa_codigo);

        $colaborador->update($request->all());
        
        $departamentos = Departamento::orderBy('depa_codigo','desc')->get();  

        return view('pages.colaborador.edit', compact('colaborador', 'departamentos'));
    }

    // Editar
    public function update(ColRequest $request, $cola_codigo) {

        $colaborador = Colaborador::findOrFail($cola_codigo);

        $colaborador->update($request->validated());

        return redirect()
            ->route('colaborador')
            ->with('success','Colaborador atualizado com sucesso!');
    
    }

    // Alterar status
    public function inativar($cola_codigo)
    {
        $colaborador = Colaborador::findOrFail($cola_codigo);

        $colaborador->cola_ativo = $colaborador->cola_ativo ? 0 : 1;
        $colaborador->save();

        if ($colaborador->cola_ativo == 0) {
            \App\Models\Maquina::where('maqu_responsavel', $cola_codigo)
                ->update(['maqu_responsavel' => null]);
        }

        return redirect()
            ->route('colaborador')
            ->with('success', 'Status do colaborador alterado e máquinas desvinculadas!');
    }

}
