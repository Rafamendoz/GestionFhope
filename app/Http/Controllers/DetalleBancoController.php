<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetalleBanco;
class DetalleBancoController extends Controller
{
    

    public function setDetalleBanco(Request $request){
        $detalleBanco = DetalleBanco::create($request->all());
        return response()->json(["Detalle Banco"=>$detalleBanco,"Codigo"=>"202","Estado"=>"Exitoso", "Descripcion:"=>"Registro Agregado"], 202);


    }

    public function getDetallesBancoRest(){
        $detallesBanco = DetalleBanco::all();
        return response()->json([
            "Detalles Banco"=>$detallesBanco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }

    public function getDetalleBancoRestById($id){
        $detalleBanco = DetalleBanco::where('id_banco',$id)->get();
        return response()->json([
            "DetallE Banco"=>$detalleBanco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);


    }

    public function getDetalleBancoRestByTipoTransaccion(Request $request,$id){
        $detalleBanco = DetalleBanco::where('id_banco', $id)->where('id_tipoTransaccion', $request->id_tipoTransaccion)->get();
        return response()->json([
            "DetalleBanco"=>$detalleBanco, 
            "Codigo"=>"202",
            "Estado"=>"Exitoso"
        ], 202);

    }

    

  




}
