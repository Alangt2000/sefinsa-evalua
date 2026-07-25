<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CandidatoAuthController;
use App\Http\Controllers\ExamenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RhController;



Route::get('/', [AuthController::class, 'mostrarLogin'])
    ->name('login');

Route::post('/iniciar-sesion', [AuthController::class, 'iniciarSesion'])
    ->name('login.procesar');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

    Route::resource('candidatos', CandidatoController::class);

    Route::patch(
        '/candidatos/{candidato}/cambiar-acceso',
        [CandidatoController::class, 'cambiarAcceso']
    )->name('candidatos.cambiar-acceso');

    Route::get(
    '/candidatos/{candidato}/evaluaciones',
    [ExamenController::class, 'index']
    )->name('examenes.index');

    Route::post(
    '/candidatos/{candidato}/evaluaciones/matematicas/iniciar',
    [ExamenController::class, 'iniciarMatematicas']
    )->name('examenes.matematicas.iniciar');

    Route::post('/cerrar-sesion', [AuthController::class, 'cerrarSesion'])
        ->name('logout');

});
/*
|--------------------------------------------------------------------------
| ACCESO DE CANDIDATOS
|--------------------------------------------------------------------------
*/

Route::get('/candidato', [CandidatoAuthController::class, 'login'])
    ->name('candidato.login');

Route::post('/candidato/login', [CandidatoAuthController::class, 'autenticar'])
    ->name('candidato.autenticar');

Route::get('/candidato/dashboard', [CandidatoAuthController::class, 'dashboard'])
    ->name('candidato.dashboard');

Route::post('/candidato/logout', [CandidatoAuthController::class, 'logout'])
    ->name('candidato.logout');

Route::get(
    '/candidato/evaluaciones/matematicas',
    [ExamenController::class, 'instruccionesMatematicas']
)->name('candidato.matematicas.instrucciones');

Route::post(
    '/candidato/evaluaciones/matematicas/iniciar',
    [ExamenController::class, 'iniciarMatematicasCandidato']
)->name('candidato.matematicas.iniciar');

Route::get(
    '/candidato/evaluaciones/matematicas/examen',
    [ExamenController::class, 'mostrarMatematicasCandidato']
)->name('candidato.matematicas.examen');

Route::post(
    '/candidato/evaluaciones/matematicas/guardar-respuesta',
    [ExamenController::class, 'guardarRespuestaMatematicas']
)->name('candidato.matematicas.guardar');

Route::post(
    '/candidato/evaluaciones/matematicas/finalizar',
    [ExamenController::class, 'finalizarMatematicas']
)->name('candidato.matematicas.finalizar');

/*
|--------------------------------------------------------------------------
| EXAMEN PSICOMÉTRICO DEL CANDIDATO
|--------------------------------------------------------------------------
*/

Route::get(
    '/candidato/evaluaciones/psicometrico',
    [ExamenController::class, 'instruccionesPsicometrico']
)->name('candidato.psicometrico.instrucciones');

Route::post(
    '/candidato/evaluaciones/psicometrico/iniciar',
    [ExamenController::class, 'iniciarPsicometricoCandidato']
)->name('candidato.psicometrico.iniciar');

Route::get(
    '/candidato/evaluaciones/psicometrico/examen',
    [ExamenController::class, 'mostrarPsicometricoCandidato']
)->name('candidato.psicometrico.examen');

Route::post(
    '/candidato/evaluaciones/psicometrico/guardar-respuesta',
    [ExamenController::class, 'guardarRespuestaPsicometrico']
)->name('candidato.psicometrico.guardar');

Route::post(
    '/candidato/evaluaciones/psicometrico/finalizar',
    [ExamenController::class, 'finalizarPsicometrico']
)->name('candidato.psicometrico.finalizar');
