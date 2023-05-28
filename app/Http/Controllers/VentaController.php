<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Estado;
use App\Models\Error;
use App\Models\Venta;
use App\Models\User;

use Illuminate\Support\Facades\Log;

class VentaController extends Controller
{
    public function getVentas(){
        try {
            $colaboradores = Colaborador::all()->where('estado', 1);
            return view('pos', compact('colaboradores'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addColaborador(){
        $estados = Estado::all();
        $puestos = Puesto::all();
        $usuarios = User::all();
        return view('addcolaborador', compact('estados','puestos','usuarios'));
    }


    public function setColaborador(Request $request){
        try {
            $colaborador = Colaborador::create($request->all());
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

    public function getColaboradoresRest(){
        $colaboradores = Colaborador::all();
        return response()->json([
            "Colaboradores"=>$colaboradores, "Response"=>[
            "Codigo"=>"200",
            "Estado"=>"Exitoso"]
        ], 200);
        
    }

    public function getProductoRestById($id){
        $colaborador = Colaborador::find($id);
        return response()->json([
            "Colaborador"=>$colaborador, 
            "Codigo"=>"200",
            "Estado"=>"Exitoso"
        ], 200);
    }

    public function putColaborador(Request $request,$id){
        $colaborador = Colaborador::find($id);
        $colaborador->update($request->all());
        return response()->json(
            ["Colaborador"=>$colaborador
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );

    }

    public function deleteColaborador(Request $request , $id){
        Log::info("REQUEST: ".$request);
        try {
            $colaborador = Colaborador::find($id);
            $x = $request->estado;
            switch($x){
                case 1:
                    $colaborador->update($request->all());
                    $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exito", "Descripcion"=>"Registro Activado"]], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;
                    break;
                case 2:
                    $colaborador->update($request->all());
                    $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exito", "Descripcion"=>"Registro Desactivado"]], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;
                    break;
            }
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
       
    }

}
