<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaqRequest;
use Illuminate\Http\Request;
use App\Models\Maquina;
use App\Models\Colaborador;

class MaqController extends Controller
{

    // Visualiza dados maquina
    public function exibir(Request $request)
    {
        $query = Maquina::query();

        if ($request->filled('colaborador')) {
            $query->where('maqu_responsavel', $request->colaborador);
        }

        $maquinas = $query->orderBy('maqu_codigo', 'desc')->get();

        $colaboradores = Colaborador::orderBy('cola_codigo', 'desc')->get();

        return view('pages.maquina', compact('maquinas', 'colaboradores'));
    }

    // Retorno para tela de cadastro
    public function cad()
    {
        $maquinas = Maquina::orderBy('maqu_codigo', 'desc')->get();

        $colaboradores = Colaborador::where('cola_ativo', 1)
            ->orderBy('cola_codigo', 'desc')
            ->get();

        return view('pages.maquinas.add', compact('maquinas', 'colaboradores'));
    }

    // Cadastro
    public function store(MaqRequest $request)
    {
        Maquina::create($request->validated());

        return redirect()
            ->route('maquina')
            ->with('success', 'Máquina cadastrada com sucesso!');
    }


    // Retorno dados maquina editar
    public function edit(Request $request, $maqu_codigo)
    {
       
        $maquina = Maquina::findOrFail($maqu_codigo);

        $colaboradores = Colaborador::where('cola_ativo', 1)
            ->orderBy('cola_nome', 'asc')
            ->get();

        return view('pages.maquinas.edit', compact('maquina', 'colaboradores'));
    }

    // Alterar a maquina
    public function update(Request $request, $maqu_codigo){
        $maquina = Maquina::findOrFail($maqu_codigo);

        $maquina->update($request->all());

        return redirect()
            ->route('maquina')
            ->with("success","Máquina atualizada com sucesso !");
    }

    // Deletar
    public function destroy($maqu_codigo)
    {
        $maquina = Maquina::findOrFail($maqu_codigo);
        $maquina->delete();

        return redirect()->route('maquina')->with("success", "Máquina excluída!");
    }
}
