<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\EmpregadoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/setores', [SetorController::class, 'index'])->name('setores.index');
    Route::post('/setores/create', [SetorController::class, 'create'])->name('setores.create');
    Route::post('/setores/delete', [SetorController::class, 'delete'])->name('setores.delete');

    Route::get('/empregados', [EmpregadoController::class, 'index'])->name('empregados.index');
    Route::post('/empregados/create', [EmpregadoController::class, 'create'])->name('empregados.create');
    Route::post('/empregados/delete', [EmpregadoController::class, 'delete'])->name('empregados.delete');
});

require __DIR__.'/auth.php';
