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

//RUTAS PARA ENTIDAD USUARIO
Route::group(["middleware" => "apikey.validate"], function () {
 /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
Route::get('usuarios', 'App\Http\Controllers\UsuarioController@getUsuario');
 /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
Route::get('usuarioR', 'App\Http\Controllers\UsuarioController@getUsuarioRest');
 /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
Route::get('usuarioR/{id}', 'App\Http\Controllers\UsuarioController@getUsuarioRestById');
 /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
Route::post('usuarioR/add', 'App\Http\Controllers\UsuarioController@setUsuario');
 /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
Route::put('usuarioR/update/{id}', 'App\Http\Controllers\UsuarioController@putUsuario');
 /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
Route::put('usuarioR/delete/{id}', 'App\Http\Controllers\UsuarioController@deleteUsuario');

Route::post('usuarioR/loggin/validate', 'App\Http\Controllers\UsuarioController@logginUsuario');

});


//RUTAS PARA ENTIDAD Colaborador
Route::group(["middleware" => "apikey.validate"], function () {
    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('colaborador', 'App\Http\Controllers\ColaboradorController@getColaborador');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('colaboradorR', 'App\Http\Controllers\ColaboradorController@getColaboradoresRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('colaboradorR/{id}', 'App\Http\Controllers\ColaboradorController@getColaboradorRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('colaboradorR/add', 'App\Http\Controllers\ColaboradorController@setColaborador');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('colaboradorR/update/{id}', 'App\Http\Controllers\ColaboradorController@putColaborador');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::put('colaboradorR/delete/{id}', 'App\Http\Controllers\ColaboradorController@deleteColaborador');
   
   });


   Route::get('moneda', 'App\Http\Controllers\MonedaController@getMoneda');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('monedaR', 'App\Http\Controllers\MonedaController@getMonedasRest');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('monedaR/{id}', 'App\Http\Controllers\MonedaController@getMonedaRestById');
   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('monedaR/add', 'App\Http\Controllers\MonedaController@setMoneda');
   /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
  Route::put('monedaR/update/{id}', 'App\Http\Controllers\MonedaController@putMoneda');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('monedaR/delete/{id}', 'App\Http\Controllers\MonedaController@deleteMoneda');
  

//RUTAS PARA ENTIDAD Estado
Route::group(["middleware" => "apikey.validate"], function () {
    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('estado', 'App\Http\Controllers\EstadoController@getEstado');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('estadoR', 'App\Http\Controllers\EstadoController@getEstadosRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('estadoR/{id}', 'App\Http\Controllers\EstadoController@getEstadoRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('estadoR/add', 'App\Http\Controllers\EstadoController@setEstado');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('estadoR/update/{id}', 'App\Http\Controllers\EstadoController@putEstado');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::delete('estadoR/delete/{id}', 'App\Http\Controllers\EstadoController@deleteEstado');
   
   });


   //RUTAS PARA ENTIDAD Puesto
Route::group(["middleware" => "apikey.validate"], function () {
    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('puesto', 'App\Http\Controllers\PuestoController@getPuesto');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR', 'App\Http\Controllers\PuestoController@getEstadosRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR/{id}', 'App\Http\Controllers\PuestoController@getEstadoRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('puestoR/add', 'App\Http\Controllers\PuestoController@setPuesto');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('puestoR/update/{id}', 'App\Http\Controllers\PuestoController@putEstado');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::delete('puestoR/delete/{id}', 'App\Http\Controllers\PuestoController@deleteEstado');
   
   });

   Route::get('cuentaR', 'App\Http\Controllers\CuentaController@getCuentasRest');
   Route::get('cuentaR/{id}', 'App\Http\Controllers\CuentaController@getCuentaRestById');
   Route::post('cuentaR/add', 'App\Http\Controllers\CuentaController@setCuenta');
   Route::put('cuentaR/update/{id}', 'App\Http\Controllers\CuentaController@putCuenta');
   Route::put('cuentaR/delete/{id}', 'App\Http\Controllers\CuentaController@deleteCuenta');

   Route::get('transaccionR', 'App\Http\Controllers\TransaccionController@getTransaccionesRest');
   Route::get('transaccionR/{id}', 'App\Http\Controllers\TransaccionController@getTransaccionRestById');
   Route::post('transaccionR/add', 'App\Http\Controllers\TransaccionController@setTransaccion');
   Route::put('transaccionR/update/{id}', 'App\Http\Controllers\TransaccionController@putTransaccion');
   Route::put('transaccionR/delete/{id}', 'App\Http\Controllers\TransaccionController@deleteTransaccion');

