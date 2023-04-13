<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;


class ColaboradorController extends Controller
{
    public function setColaborador(Request $request){
        $colaborador = Colaborador::create($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);

    }


    public function getColaboradoresRest(){
        $colaboradores = Colaborador::all()->where('estado',1);
        if(sizeof($colaboradores)===0){
            return response()->json(["Colaboradores"=>$colaboradores,"Codigo"=>"404","Estado"=>"No Encontrado", "Descripcion:"=>"Registros No Encontrados"], 404);

        }else{
            return response()->json(["Colaboradores"=>$colaboradores,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registros Encontrados"], 202);
        }


    }

    public function getColaboradorRestById($id){
        $colaborador = Colaborador::find($id)->where('estado',1);;
        return response()->json(["Colaborador"=>$colaborador,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Obtenido"], 202);


    }

    public function putColaborador(Request $request,$id){
        $colaborador = Colaborador::find($id)->where('estado',1);;
        $colaborador->update($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Actualizado"], 202);


    }

    public function deleteColaborador(Request $request,$id){
        $colaborador = Colaborador::find($id);
        if(is_null($colaborador)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            if($request->estado===1){
                $colaborador->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
            }else{
                $colaborador->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
            }
           
        }

    }

}
    