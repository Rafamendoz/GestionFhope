<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;

class EstadoController extends Controller
{
    public function getEstadosRest(){
        $estados = Estado::all();
        if(sizeof($estados)===0){
            return response()->json(["Estados"=>$estados,"Codigo"=>"404","Estado"=>"No Encontrado", "Descripcion:"=>"Registros No Encontrados"], 404);

        }else{
            return response()->json(["Estados"=>$estados,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registros Encontrados"], 202);
        }


    }

    public function setEstado(Request $request){
        $estado = Estado::create($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);

    }

    public function getEstadoRestById($id){
        $estado = Estado::find($id)->where('estado',1);;
        return response()->json(["Colaborador"=>$colaborador,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Obtenido"], 202);


    }

    public function putColaborador(Request $request,$id){
        $estado = Estado::find($id)->where('estado',1);;
        $estado->update($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Actualizado"], 202);


    }

    public function deleteEstado($id){
        $estado = Estado::find($id);
        if(is_null($estado)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se elimino el registro solicitado, ya que no existe"], 404);
        }else{
                
            if($estado->delete()){
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Eliminado"], 202);
            }else{
                return response()->json(["Estado"=>"Fallido", "Descripcion:"=>"Error"], 408);

            }
            
           
        }



    }
}
