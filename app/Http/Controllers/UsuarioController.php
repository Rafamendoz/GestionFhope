<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function getUsuario(){
        $data = Usuario::all()->where('estado',1);
        if(sizeof($data)===0){
            $data=array();
            return view('usuarios', compact('data'));
        }else{
            return view('usuarios', compact('data'));
        }
    
   }

   public function getUsuarioRest(){
    $data = Usuario::all()->where('estado',1);
   
    if(is_null($data) || sizeof($data)<1){
        return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se encontraron los registros solicitado"], 404);
    }else{
        return response()->json($data, 202);
    }


    }

    public function getUsuarioRestById($id){
        $data = Usuario::all()->where('id',$id)->where('estado',1);
       
        if(is_null($data) || sizeof($data)<1){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se encontro el registro solicitado"], 404);
        }else{
            return response()->json($data, 202);
        }
    
    
        }


    public function saveUsuario(Request $request){
        $usuario = Usuario::create($request->all());
        return response()->json(["Estado"=>"Exito"], 202);

    }

    public function updateUsuario(Request $request, $id){
        $usuario = Usuario::find($id);
        if(is_null($usuario)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se actualizo el registro solicitado, ya que no existe"], 404);
        }else{
            $usuario->update($request->all());
            return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Actualizado"], 202);
        }
    

    }

    public function deleteUsuario(Request $request,$id){
        $usuario = Usuario::find($id);
        if(is_null($usuario)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            if($request->estado===1){
                $usuario->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
            }else{
                $usuario->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
            }
           
        }
    

    }


  

   
}
