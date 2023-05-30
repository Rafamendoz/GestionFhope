<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\DetalleVenta;


class CreatePdf extends Controller
{
    public function crearRecibo(){
    $data =DetalleVenta::join('producto','producto_id','=','producto.id')->select('producto.producto_nom', 'detalleventa.precio','detalleventa.cantidad')->get();

    $customPaper = array(0,0,720,1440);
    $pdf = Pdf::loadView('recibos', compact('data'))->setPaper($customPaper, 'portrait');

    return $pdf->download('invoice.pdf');}

}
