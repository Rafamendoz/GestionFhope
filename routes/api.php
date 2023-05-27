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


});


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

//RUTAS PARA ENTIDAD Colaborador

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
   
 


   //RUTAS PARA ENTIDAD Puesto

    /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('puesto', 'App\Http\Controllers\PuestoController@getPuesto');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR', 'App\Http\Controllers\PuestoController@getPuestosRest');
    /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
   Route::get('puestoR/{id}', 'App\Http\Controllers\PuestoController@getPuestoRestById');
    /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
   Route::post('puestoR/add', 'App\Http\Controllers\PuestoController@setPuesto');
    /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
   Route::put('puestoR/update/{id}', 'App\Http\Controllers\PuestoController@putPuesto');
    /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
   Route::put('puestoR/delete/{id}', 'App\Http\Controllers\PuestoController@deletePuesto');
   
 
      //RUTAS PARA ENTIDAD Cuenta
   Route::get('cuentaR', 'App\Http\Controllers\CuentaController@getCuentasRest');
   Route::get('cuentaR/{id}', 'App\Http\Controllers\CuentaController@getCuentaRestById');
   Route::post('cuentaR/add', 'App\Http\Controllers\CuentaController@setCuenta');
   Route::put('cuentaR/update/{id}', 'App\Http\Controllers\CuentaController@putCuenta');
   Route::put('cuentaR/delete/{id}', 'App\Http\Controllers\CuentaController@deleteCuenta');

      //RUTAS PARA ENTIDAD Transaccion
   Route::get('transaccionR', 'App\Http\Controllers\TransaccionController@getTransaccionesRest');
   Route::get('transaccionR/{id}', 'App\Http\Controllers\TransaccionController@getTransaccionRestById');
   Route::post('transaccionR/add', 'App\Http\Controllers\TransaccionController@setTransaccion');
   Route::put('transaccionR/update/{id}', 'App\Http\Controllers\TransaccionController@putTransaccion');
   Route::put('transaccionR/delete/{id}', 'App\Http\Controllers\TransaccionController@deleteTransaccion');

   //RUTAS PARA ENTIDAD Banco
   Route::get('bancoR', 'App\Http\Controllers\BancoController@getBancosRest');
   Route::get('bancoR/{id}', 'App\Http\Controllers\BancoController@getBancoRestById');
   Route::post('bancoR/add', 'App\Http\Controllers\BancoController@setBanco');
   Route::put('bancoR/update/{id}', 'App\Http\Controllers\BancoController@putBanco');
   Route::put('bancoR/delete/{id}', 'App\Http\Controllers\BancoController@deleteBanco');

   //RUTAS PARA ENTIDAD DetalleBanco
   Route::get('dbancoR', 'App\Http\Controllers\DetalleBancoController@getDetallesBancoRest');
   Route::get('dbancoR/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancoRestById');
   Route::post('dbancoR/add', 'App\Http\Controllers\DetalleBancoController@setDetalleBanco');
   Route::post('dbancoR/transaccion/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancoRestByTipoTransaccion');

    //RUTAS PARA ENTIDAD Token
    Route::get('tokenR', 'App\Http\Controllers\DetalleBancoController@getDetallesBancoRest');
    Route::get('tokenR/{id}', 'App\Http\Controllers\DetalleBancoController@getDetalleBancoRestById');
    Route::post('tokenR/add', 'App\Http\Controllers\DetalleBancoController@setDetalleBanco');
  
  
    //RUTAS PARA ENTIDAD CLIENTE
     /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
   Route::get('cliente', 'App\Http\Controllers\ClienteController@getCliente');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('clienteR', 'App\Http\Controllers\ClienteController@getClientesRest');
   /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
  Route::get('clienteR/{id}', 'App\Http\Controllers\ClienteController@getClienteRestById');
   /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
  Route::post('clienteR/add', 'App\Http\Controllers\ClienteController@setCliente');
   /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
  Route::put('clienteR/update/{id}', 'App\Http\Controllers\ClienteController@putCliente');
   /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
  Route::put('clienteR/delete/{id}', 'App\Http\Controllers\ClienteController@deleteCliente');

      //RUTAS PARA ENTIDAD PRODUCTO
     /* RUTA PARA METODO DE OBTENER TODOS LOS USUARIOS ACTIVOS PARA LA VISTA*/
     /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
    Route::get('productoR', 'App\Http\Controllers\ProductoController@getProductosRest');
     /* RUTA PARA METODO DE OBTENER EL USUARIO POR ID ACTIVO*/
    Route::get('productoR/{id}', 'App\Http\Controllers\ProductoController@getProductoRestById');
     /* RUTA PARA METODO DE AGREGAR UN USUARIO*/
    Route::post('productoR/add', 'App\Http\Controllers\ProductoController@setProducto');
     /* RUTA PARA METODO DE ACTUALIZAR UN USUARIO POR ID*/
    Route::put('productoR/update/{id}', 'App\Http\Controllers\ProductoController@putProducto');
     /* RUTA PARA METODO DE ACTUALIZAR EL ESTADO DEL USUARIO POR ID ACTIVO*/
    Route::put('productoR/delete/{id}', 'App\Http\Controllers\ProductoController@deleteProducto');
  
  


