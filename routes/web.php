<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Models\Usuario;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->name("Dashboard");


Route::get('/login/{id}', 'App\Http\Controllers\UsuarioController@validarCredenciales');





//CRUD PUESTO//
Route::get('puestos', 'App\Http\Controllers\PuestoController@getPuestos')->name('Puestos');
Route::get('puestos/addpuesto', 'App\Http\Controllers\PuestoController@addPuesto')->name('AddPuesto');


//CRUD USUARIO//
Route::get('usuarios', 'App\Http\Controllers\UsuarioController@getUsuario')->name('Usuarios');

//CRUD CLIENTE//
Route::get('clientes', 'App\Http\Controllers\ClienteController@getClientes')->name('Clientes');
Route::get('clientes/addcliente', 'App\Http\Controllers\ClienteController@addCliente')->name('AddCliente');

//CRUD PRODUCTOS//
Route::get('productos', 'App\Http\Controllers\ProductoController@getProductos')->name('Productos');
Route::get('productos/addproducto', 'App\Http\Controllers\ProductoController@addProducto')->name('AddProducto');

//CRUD COLABORADORES//
Route::get('colaboradores', 'App\Http\Controllers\ColaboradorController@getColaboradores')->name('Colaboradores');
Route::get('colaboradores/addcolaborador', 'App\Http\Controllers\ColaboradorController@addColaborador')->name('AddColaborador');

//CRUD VENTAS//
Route::get('ventas', 'App\Http\Controllers\VentaController@getVentas')->name('Ventas');
Route::get('ventas/addventa', 'App\Http\Controllers\ColaboradorController@addVentas')->name('AddVenta');

//CRUD POS//
Route::get('pos', 'App\Http\Controllers\POSController@getPOS')->name('POS');

//CRUD BANCOS//
Route::get('bancos', 'App\Http\Controllers\ColaboradorController@getVentas')->name('Bancos');


Route::get('tipocuentasbancarias', 'App\Http\Controllers\ColaboradorController@getVentas')->name('TipoCuentasBancarias');


Route::get('tipomonedas', 'App\Http\Controllers\ColaboradorController@getVentas')->name('TipoMonedas');
Route::get('tipotransaccion', 'App\Http\Controllers\ColaboradorController@getVentas')->name('TipoTransaccion');


Route::post('validate', 'App\Http\Controllers\LoginController@login')->name('Validate');
Route::get('logout', 'App\Http\Controllers\LoginController@logout')->name('Logout');
Route::get('/recibo', 'App\Http\Controllers\CreatePdf@crearRecibo');
Route::get('ver/recibo/{id}', 'App\Http\Controllers\CreatePdf@verRecibo')->name('VerRecibo');





