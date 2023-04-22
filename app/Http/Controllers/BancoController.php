<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banco;

class BancoController extends Controller
{
    public function setBanco(Request $request){
        $banco = Banco::create($request->all());
        return response()->json(["Banco"=>$banco,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);
    }

    public function getBancosRest(){
        $bancos = Banco::all();
        return response()->json([
            "Bancos"=>$bancos, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);
    }

    public function getBancoRestById($id){
        $banco = Banco::find($id);
        return response()->json([
            "Banco"=>$banco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }

    public function putBanco(Request $request, $id){
        $banco = Banco::find($id);
        $banco->update($request->all());
        return response()->json(
            ["Banco"=>$banco
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );
    }
    
    public function deleteBanco(Request $request, $id){
        $banco = Banco::find($id);
        $x = $request->estado;

        if(is_null($banco)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);

        }else{
            switch($x){
                case 1:
                    $banco->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
                    break;
                case 2:
                    $banco->update($request->all());
                    return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);    
                    break;
             
            }   
        }
    }
}
