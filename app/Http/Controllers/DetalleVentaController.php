<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Models\DetalleVenta;
use Illuminate\Support\Facades\Log;


class DetalleVentaController extends Controller
{
    


    public function setDetalleVenta(Request $request){
        try {
            $dventa = DetalleVenta::create($request->all());
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

  

    public function getDetalleVentaRestByVentaId(Request $request,$id){
        try {
            $dventa = DetalleVenta::where('venta_id', $id)->get();
            Log::info("REQUEST: ".$request);
            $response =response()->json([
                "DetalleVenta"=>$dventa, 
                "Codigo"=>"200",
                "Estado"=>"Exitoso"
            ], 200);
            Log::info("RESPONSE: ".$response);
            return $response;

        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
     
    }

    

    public function deleteDetalleVenta(Request $request , $id){
        Log::info("REQUEST: ".$request);
        try {
            $venta =Venta::where('venta_id', $id)->get();
            $x = $request->estado;
            switch($x){
                case 1:
                    $venta->update($request->all());
                    $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exito", "Descripcion"=>"Registro Activado"]], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;
                    break;
                case 2:
                    $venta->update($request->all());
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
