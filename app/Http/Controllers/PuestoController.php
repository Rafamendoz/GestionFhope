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

    public function getPuestosRest(){
        $puestos = Puesto::all();
        return response()->json([
            "Puestos"=>$puestos, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);
        
    }

    public function getPuestoRestById($id){
        $puesto = Puesto::find($id);
        return response()->json([
            "Puesto"=>$puesto, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);
    }

    public function putPuesto(Request $request,$id){
        $puesto = Puesto::find($id);
        $puesto->update($request->all());
        return response()->json(
            ["Puesto"=>$puesto
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );

    }

    public function deletePuesto(Request $request , $id){
        $puesto = Puesto::find($id);
        $x = $request->estado;
        switch($x){
            case 1:
                $puesto->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
                break;
            case 2:
                $puesto->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
                break;
        }
    }
}
