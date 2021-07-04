<?php
Use App\Http\Controllers\NominaController;
Use App\Http\Controllers\EmpleadoController;
Use App\Http\Controllers\DepartamentoController;
Use App\Http\Controllers\AvisoController;
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
Route::get('inicio', function () {
    return view('inicio');
});
Route::get('/', function () {
    return view('inicio');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('aviso/{aviso}/agrega-departamento', [AvisoController::class, 'agregaDepartamento'])->name('aviso.agrega-departamento');
Route::resource('aviso',AvisoController::class)->middleware('auth');
Route::resource('nomina',NominaController::class)->middleware('auth');
Route::resource('empleado',EmpleadoController::class)->middleware('auth');
Route::resource('departamento',DepartamentoController::class)->middleware('auth');
