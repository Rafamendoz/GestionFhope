<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Puesto;
use App\Models\Estado;
use App\Models\Error;


use Illuminate\Support\Facades\Log;




class PuestoController extends Controller
{
    public function getPuestos(){
        try {
            $puestos = Puesto::all()->where('estado', 1);
            return view('puestos', compact('puestos'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addPuesto(){
        $estados = Estado::all();
        return view('addpuesto', compact('estados'));
    }


    public function setPuesto(Request $request){
        try {
            $puesto = Puesto::create($request->all());
            Log::info("REQUEST: ".$request);
           $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exitoso", "Descripcion"=>"Registro Agregado"]], 200);
           Log::info("RESPONSE: ".$response);
           return $response;
        } catch (\Illuminate\Database\QueryException $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    }

    public function getPuestosRest(){
        $puestos = Puesto::all();
        return response()->json([
            "Puestos"=>$puestos, "Response"=>[
            "Codigo"=>"202",
            "Estado"=>"Exitoso"]
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
