<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plano;

class HomeController extends Controller
{
    public function index()
    {
    
        return view('home');
    }
}
