<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    public function exibir()
    {
        $userId = Auth::id();

        $categorias = Categoria::where('cat_codclie', $userId)
            ->orderBy('cat_codigo', 'asc')
            ->get();

        return view('pages.categorias', compact('categorias'));
    }
}
