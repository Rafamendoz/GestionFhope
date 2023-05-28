<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Estado;
use App\Models\Error;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    public function getProductos(){
        try {
            $productos = Producto::all()->where('estado', 1);
            return view('productos', compact('productos'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }

    public function addProducto(){
        $estados = Estado::all();
        return view('addproducto', compact('estados'));
    }


    public function setProducto(Request $request){
        try {
            $producto = Producto::create($request->all());
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

    public function getProductosRest(){
        $productos = Producto::all();
        return response()->json([
            "Productos"=>$productos, "Response"=>[
            "Codigo"=>"202",
            "Estado"=>"Exitoso"]
        ], 200);
        
    }

    public function getProductoRestById($id){
        $producto = Producto::find($id);
        return response()->json([
            "Producto"=>$producto, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 200);
    }

    public function putProducto(Request $request,$id){
        $producto = Cliente::find($id);
        $producto->update($request->all());
        return response()->json(
            ["Producto"=>$producto
            ,"Codigo"=>"200",
            "Estado"=>"Exitoso",
            "Descripcion"=>"Registro Modificado"
            ]
        );

    }

    public function deleteProducto(Request $request , $id){
        Log::info("REQUEST: ".$request);
        try {
            $producto = Producto::find($id);
            $x = $request->estado;
            switch($x){
                case 1:
                    $producto->update($request->all());
                    $response = response()->json(["Data_Respuesta"=>["Codigo"=>"200","Estado"=>"Exito", "Descripcion"=>"Registro Activado"]], 200);
                    Log::info("RESPONSE: ".$response);
                    return $response;
                    break;
                case 2:
                    $producto->update($request->all());
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
