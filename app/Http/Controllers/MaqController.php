<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;

class MaqController extends Controller
{

    // Visualiza dados maquina
     public function exibir(Request $request) 
    {   
        $query = Maquina::query();

        $maquina = $query
            ->orderBy("created_at","desc")
            ->get();

        return view("pages.maquina", compact("maquina"));
    }

    // Retorno dados maquina editar
    public function edit($maqu_codigo) 
    {      
        $maquina = Maquina::findOrFail($maqu_codigo);

        return view("pages.maquinas.edit", compact("maquina"));
    }

    // Alterar a maquina
    public function update(Request $request, $maqu_codigo){
        $maquina = Maquina::findOrFail($maqu_codigo);

        $maquina->update($request->all());

        return redirect('pages.maquina')->back()->with("success","Máquina atualizada com sucesso !");
    }
}
