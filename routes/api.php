<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConfiguracionCargaController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\ControlCargaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Rutas Usuario
Route::post('/login', [UsuarioController::class, 'loginUsuario']);
Route::post('/registrar', [UsuarioController::class, 'registrarUsuario']);

//Rutas configuracion carga

Route::post('/registrarconfigcarga', [ConfiguracionCargaController::class, 'registrarCarga']);
Route::get('/listarconfigcarga', [ConfiguracionCargaController::class, 'listarCarga']);
Route::post('/actualizarconfigcarga', [ConfiguracionCargaController::class, 'actualizarCarga']);
Route::post('/eliminarconfigcarga', [ConfiguracionCargaController::class, 'eliminarCarga']);


//Rutas Solicitudes
Route::post('/registrarsolicitud', [SolicitudController::class, 'registrarSolicitud']);
Route::get('/listarsolicitud', [SolicitudController::class, 'listarSolicitud']);
Route::post('/actualizarsolicitud', [SolicitudController::class, 'actualizarSolicitud']);
Route::get('/eliminarsolicitud/{id}', [SolicitudController::class, 'eliminarSolicitud']);
Route::get('/cancelarsolicitud/{id}', [SolicitudController::class, 'cancelarSolicitud']);
Route::post('/listarsolicitudusuario', [SolicitudController::class, 'listarSolicitudUsuario']);

//Rutas ControlCargas
Route::post('/registrarcontrolcarga', [ControlCargaController::class, 'registrarCarga']);
