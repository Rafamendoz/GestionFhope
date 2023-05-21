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





Route::get('/admin', function () {
    return view('admin');
});


Route::get('/login/{id}', 'App\Http\Controllers\UsuarioController@validarCredenciales');




Route::get('/productos', function () {
    return view('productos');
});

//CRUD PUESTO//
Route::get('puestos', 'App\Http\Controllers\PuestoController@getPuestos')->name('Puestos');
Route::get('puestos/addpuesto', 'App\Http\Controllers\PuestoController@addPuesto')->name('AddPuesto');


//CRUD USUARIO//
Route::get('usuarios', 'App\Http\Controllers\UsuarioController@getUsuario')->name('Usuarios');
