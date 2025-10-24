<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\MaqController;
use App\Http\Controllers\ColController;
use App\Http\Controllers\DepController;

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
        Route::get('/departamento', [DepController::class, 'exibir'])->name('departamento');
        Route::get('/colaborador', [ColController::class, 'exibir'])->name('colaborador');

        // MAQUINA
        Route::get('/maquinas/cadastro', [MaqController::class, 'cad'])->name('cadMaquina');
        Route::post('/maquinas/cadastro', [MaqController::class, 'store'])->name('cadastroMaquina');

        Route::get('/maquina/{maqu_codigo}/editar', [MaqController::class, 'edit'])->name('editMaquina');
        Route::post('/maquina/{maqu_codigo}/editar', [MaqController::class, 'edit'])->name('updateMaquina');

        Route::delete('/maquina/{maqu_codigo}', [MaqController::class,'destroy'])->name('deleteMaquina');

        // COLABORADOR
        Route::get('/colaborador/cadastro', [ColController::class, 'cad'])->name('cadColaborador');
        Route::post('/colaborador/cadastro', [ColController::class, 'store'])->name('cadastroColaborador');

        Route::get('/colaborador/{cola_codigo}/editar', [ColController::class, 'edit'])->name('editColaborador');
        Route::post('/colaborador/{cola_codigo}/editar', [ColController::class, 'edit'])->name('updateColaborador');

        Route::delete('/colaborador/{cola_codigo}', [ColController::class,'destroy'])->name('deleteColaborador');

        // DEPARTAMENTO
        Route::get('/departamento/cadastro', [DepController::class, 'cad'])->name('cadDepartamento');
        Route::post('/departamento/cadastro', [DepController::class,'store'])->name('cadastroDepartamento');

        Route::get('/departamento/{depa_codigo}/editar', [DepController::class, 'edit'])->name('editDepartamento');
        Route::post('/departamento/{depa_codigo}/editar', [DepController::class, 'edit'])->name('updateDepartamento');

        Route::delete('/departamento/{depa_codigo}', [DepController::class,'destroy'])->name('deleteDepartamento');
    });
});

