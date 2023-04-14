<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Moneda;

class MonedaController extends Controller
{
    public function setMoneda(Request $request){
        $moneda = Moneda::create($request->all());
        return response()->json(["Moneda"=>$moneda,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);

    }

    public function getMonedasRest(){
        $monedas = Moneda::all();
        return response()->json(["Monedas"=>$monedas,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Encontrados"], 202);

    }

    public function getMonedaRestById($id){
        $moneda = Moneda::find($id);
        return response()->json(["Moneda"=>$moneda,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Encontrado"], 202);

    }

    public function putMoneda(Request $request, $id){
        $moneda = Moneda::find($id);
        $moneda->update($request->all());
        return response()->json(["Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Modificado"], 202);

    }

    public function deleteMoneda(Request $request, $id){
        $moneda = Moneda::find($id);
        if(is_null($moneda)){
            return response()->json(["Estado"=>'Fallido', "Descripcion:"=>"No se desactivo el registro solicitado, ya que no existe"], 404);
        }else{
            if($request->estado===1){
                $moneda->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Activado"], 202);
            }else{
                $moneda->update($request->all());
                return response()->json(["Estado"=>"Exito", "Descripcion:"=>"Registro Desactivado"], 202);
            }
           
        }

    }
}
