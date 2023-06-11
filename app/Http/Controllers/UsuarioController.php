<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\ModelHasRoles;


class UsuarioController extends Controller
{
    public function getUsuario(){
        $data = User::all()->where('estado',1);
        if(sizeof($data)===0){
            $data=array();
            return view('usuarios', compact('data'));
        }else{
            return view('usuarios', compact('data'));
        }
    
   }



   public function getUsuarioRest(){
    $data = User::all()->where('estado',1);
   
    if(is_null($data) || sizeof($data)<1){
        return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se encontraron los registros solicitado"], 404);
    }else{
        return response()->json($data, 202);
    }


    }

    public function getUsuarioRestById($id){
        $data = User::all()->where('user',$id)->where('estado',1);
       
        if(is_null($data) || sizeof($data)<1){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se encontro el registro solicitado"], 404);
        }else{
            return response()->json($data, 202);
        }
    
    
        }


    public function setUsuario(Request $request){
        $contra =   Hash::make($request->password);
        $usuario = User::insert(['email'=>$request->email,'password'=>$contra,'user'=>$request->user,'intentos'=>$request->intentos,'estado'=>$request->estado]);
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);

    }

    public function putUsuario(Request $request, $id){
        $usuario = User::find($id);
        if(is_null($usuario)){
            return response()->json(["Codigo"=>"412","Estado"=>'Fallido', "Descripcion:"=>"No se actualizo el registro solicitado, ya que no existe"], 412);
        }else{
            $usuario->update($request->all());
            return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Actualizado"], 202);
        }
    

    }


   




    public function deleteUsuario(Request $request,$id){
        $usuario = User::find($id);
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

    public function logginUsuario(Request $request){
        $usuario = User::where('user',$request->user)->get();
        if($usuario[0]->user === $request->user &&  $usuario[0]->password=== $request->password){
            return response()->json(["Valor"=>"1","Estado"=>"Exito"], 202);
        }else{
            return response()->json(["Valor"=>"0","Estado"=>"Fallo"], 202);
        }
    }



  

   
}
