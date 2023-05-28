<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Estado;
use App\Models\Error;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    public function getClientes(){
        try {
            $clientes = Cliente::all()->where('estado', 1);
            return view('clientes', compact('clientes'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addCliente(){
        $estados = Estado::all();
        return view('addcliente', compact('estados'));
    }


    public function setCliente(Request $request){
        try {
            $cliente = Cliente::create($request->all());
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

    public function getClientesRest(){
        $clientes = Cliente::all();
        return response()->json([
            "Clientes"=>$clientes, "Response"=>[
            "Codigo"=>"200",
            "Estado"=>"Exitoso"]
        ], 200);
        
    }

    public function getClienteRestById($id, Request $request){
        try {
            $cliente = Cliente::where('cliente_DNI',$id)->get();
            Log::info("REQUEST: ".$request);
            if(sizeof($cliente)<1){
                $error = Error::where('codigo_error',404)->get();
                $response =  response()->json(["Estado"=>"No Encontrado","Codigo"=>404, "Mapping_Error"=>$error],404);
                Log::info("RESPONSE: ".$response);
                return $response;

            }else{
                $response = response()->json([
                    "Cliente"=>$cliente, "Response"=>[
                    "Codigo"=>"200",
                    "Descripcion"=>"Registro Encontrado",
                    "Estado"=>"Exitoso"]
                ], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;

            }
            
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
        
    }

    public function putCliente(Request $request,$id){
        $cliente = Cliente::find($id);
        $cliente->update($request->all());
        return response()->json(
            ["Cliente"=>$cliente
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );

    }

    public function deleteCliente(Request $request , $id){
        Log::info("REQUEST: ".$request);
        try {
            $puesto = Cliente::find($id);
            $x = $request->estado;
            switch($x){
                case 1:
                    $puesto->update($request->all());
                    $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exito", "Descripcion"=>"Registro Activado"]], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;
                    break;
                case 2:
                    $puesto->update($request->all());
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
