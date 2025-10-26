<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento;
use App\Http\Requests\DepRequest;

class DepController extends Controller
{
    // Retorna tela de cadastro
    public function exibir(Request $request)
    {
        $query = Departamento::query();

        if ($request->filled('departamento')) {
            $query->where('maqu_responsavel', $request->colaborador);
        }

        $departamento = $query->orderBy('depa_codigo', 'desc')->get();


        return view('pages.departamento', compact('departamento'));
    }

    // Retorna tela de cadastro
    public function cad(Departamento $departamento){
        return view('pages.departamento.add');
    }

    // Cadastro
    public function store(DepRequest $request) {
        Departamento::create($request->validated());

        return redirect()
            ->route('departamento')
            ->with('success','Departamento cadastrado com sucesso!');
    }

    // Retorna tela editar
    public function edit(Request $request, $depa_codigo){

        $departamento = Departamento::findOrFail($depa_codigo);

        return view('pages.departamento.edit', compact('departamento'));
   ;
    }

    // Editar
    public function update(DepRequest $request, $depa_codigo) {

        $departamento = Departamento::findOrFail($depa_codigo);

        $departamento->update($request->validated());

        return redirect()
            ->route('departamento')
            ->with('success','Departamento atualizado com sucesso!');
    
    }

    // Deletar
    public function destroy($depa_codigo){

        $departamento = Departamento::findOrFail($depa_codigo);
        $departamento->delete();

        return redirect()->route('departamento')->with('success','Departamento excluído!');

    }
}