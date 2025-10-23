<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\MaqController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/cadastro', function () {
    return view('cadastroUsuario');
})->name('cadastro');

Route::middleware(['web'])->group(function () { 
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/cadastro', [AuthController::class, 'cadastro'])->name('cadastro');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['verifica.login'])->group(function () {
        Route::get('/dashboard', [DashController::class, 'AtivoXDesativos'])->name('dashboard');
        Route::get('/maquina', [MaqController::class,'exibir'])->name('maquina');

        Route::get('/maquinas/cadastro', [MaqController::class, 'cad'])->name('cadMaquina');
        Route::post('/maquinas/cadastro', [MaqController::class, 'store'])->name('cadastroMaquina');

        Route::get('/maquina/{maqu_codigo}/editar', [MaqController::class, 'edit'])->name('editMaquina');
        Route::post('/maquina/{maqu_codigo}/editar', [MaqController::class, 'edit'])->name('updateMaquina');

        Route::delete('/maquina/{maqu_codigo}', [MaqController::class,'destroy'])->name('deleteMaquina');
    });
});

