<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;


class PuestoController extends Controller
{
    public function setPuesto(Request $request){
        $puesto = Puesto::create($request->all());
        return response()->json(["Puesto"=>$puesto,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);
    }
}
