<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleVenta;


class CreatePdf extends Controller
{
    public function crearRecibo(){
    $data =DetalleVenta::join('producto','producto_id','=','producto.id')->select('producto.producto_nom', 'detalleventa.precio','detalleventa.cantidad')->where('venta_id',8)->get();

    $pdf = Pdf::loadView('recibos', compact('data'));

    return $pdf;}

    public function verRecibo($id){
        $data =DetalleVenta::join('producto','producto_id','=','producto.id')->select('producto.producto_nom', 'detalleventa.precio','detalleventa.descuento','detalleventa.cantidad','detalleventa.subtotal')->where('venta_id',$id)->get();

        return view('recibos', compact('data'));
    }

}
