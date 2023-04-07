<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTAS PARA METODOS GET

 /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS*/
Route::get('usuarios', 'App\Http\Controllers\UsuarioController@getUsuario');
 /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
Route::get('usuarioR', 'App\Http\Controllers\UsuarioController@getUsuarioRest');
Route::get('usuarioR/{id}', 'App\Http\Controllers\UsuarioController@getUsuarioRestById');
Route::post('usuarioR/add', 'App\Http\Controllers\UsuarioController@saveUsuario');
Route::put('usuarioR/update/{id}', 'App\Http\Controllers\UsuarioController@updateUsuario');
Route::put('usuarioR/delete/{id}', 'App\Http\Controllers\UsuarioController@deleteUsuario');



