<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaccion;

class TransaccionController extends Controller
{
    public function setTransaccion(Request $request){
        $transaccion = Transaccion::create($request->all());
        return response()->json(["Transaccion"=>$transaccion,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);


    }

    public function getTransaccionesRest(){
        $transacciones = Transaccion::all();
        return response()->json(["Transacciones"=>$transacciones,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);


    }
}
