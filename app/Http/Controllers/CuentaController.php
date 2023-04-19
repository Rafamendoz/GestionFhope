<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuenta;

class CuentaController extends Controller
{
    public function setCuenta(Request $request){
        $cuenta = Cuenta::create($request->all());
        return response()->json(["Cuenta"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);
    }
    

    public function getCuentasRest(){
        $cuentas = Cuenta::all();
        return response()->json(["Cuentas"=>$cuentas,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registros Encontrados"], 202);

    }

    public function getCuentaRestById($id){
        $cuenta = Cuenta::where('id',$id)->get();
        if(is_null($cuenta) || sizeof($cuenta) ===0 ){
            return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"404","Estado"=>"No Encontrado", "Descripcion:"=>"Registro No Encontrado"], 404);
        }else{
            return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Encontrado"], 202);

        }

    }

    public function putCuenta(Request $request, $id){
        $cuenta = Cuenta::find($id);
        $cuenta->update($request->all());
        return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Modificado"], 202);
    }


    public function deleteCuenta(Request $request, $id){
        $cuenta = Cuenta::find($id);
        $cuenta->update($request->all());
        return response()->json(["Cuenta:"=>$cuenta,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Activado"], 202);
    }

}
