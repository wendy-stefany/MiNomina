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
    return view('login');
});
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('nomina',NominaController::class);
Route::resource('empleado',EmpleadoController::class);
Route::resource('departamento',DepartamentoController::class);
Route::resource('aviso',AvisoController::class);