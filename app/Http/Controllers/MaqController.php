<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maquina;

class MaqController extends Controller
{
     public function exibir(Request $request) 
    {   
        $query = Maquina::query();

        $maquina = $query
            ->orderBy("created_at","desc")
            ->get();

        return view("pages.maquina", compact("maquina"));
    }
}
