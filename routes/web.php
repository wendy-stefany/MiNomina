<?php
Use App\Http\Controllers\ArchivoController;
Use App\Http\Controllers\NominaController;
Use App\Http\Controllers\EmpleadoController;
Use App\Http\Controllers\DepartamentoController;
Use App\Http\Controllers\AvisoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
// Rutas correo verificacion///////////////////////////////////////

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');
// Enviar de nuevo correo
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
////////////////////////////////////////////////////////////////////
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
Route::resource('aviso',AvisoController::class)->middleware('auth')->middleware('verified');
Route::resource('nomina',NominaController::class)->middleware('auth')->middleware('verified');
Route::resource('empleado',EmpleadoController::class)->middleware('auth')->middleware('verified');
Route::resource('departamento',DepartamentoController::class)->middleware('auth')->middleware('verified');

Route::get('nomina/descarga/{nomina}',[NominaController::class, 'descargar'])->name('nomina.descargar')->middleware('auth')->middleware('verified');
Route::get('aviso/descarga/{aviso}',[AvisoController::class, 'descargar'])->name('aviso.descargar')->middleware('auth')->middleware('verified');

Route::get('archivo/descarga/{archivo}',[ArchivoController::class, 'descargar'])->name('archivo.descargar');
Route::resource('archivo',ArchivoController::class);
