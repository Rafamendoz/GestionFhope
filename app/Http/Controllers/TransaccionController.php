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

    public function getTransaccionRestById($id){
        $transaccion = Transaccion::find($id);
        return response()->json([
            "Transaccion"=>$transaccion, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }



    public function putTransaccion(Request $request, $id){
        $transaccion = Transaccion::find($id);
        $transaccion->update($request->all());
        return response()->json(
            ["Transaccion"=>$transaccion
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );


    }

    public function deleteTransaccion(Request $request, $id){
        $transaccion = Transaccion::find($id);
        if(is_null($transaccion)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            $x = $request->estado;
            switch($x){
                case 1:
                    $transaccion->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
                    break;
                case 2:
                    $transaccion->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
                    break;
            }
        }
       


    }

    





}
