<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColRequest;
use App\Http\Requests\MaqRequest;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Models\Colaborador;

class ColController extends Controller
{
    // Retorna tela de cadastro
    public function exibir()
    {
        $colaborador = Colaborador::orderBy('cola_codigo', 'asc')
            ->get();

        return view('pages.colaborador', compact('colaborador'));
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

    // Deletar
    public function destroy($cola_codigo){

        $colaborador = Colaborador::findOrFail($cola_codigo);
        $colaborador->delete();

        return redirect()->route('colaborador')->with('success','Departamento excluído!');

    }
}
