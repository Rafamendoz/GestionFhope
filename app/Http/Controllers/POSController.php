<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Models\Venta;

class POSController extends Controller
{
    public function getPOS(){
        try {
         
            $id = Venta::latest('id')->first();
            if(empty($id)){
                $numero_orden = $id+1;
            }else{
                $numero_orden = $id->id+1;
            }
           
            return view('pos', compact('numero_orden'));
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = 'errir';
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
      
    }
}
