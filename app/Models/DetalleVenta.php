<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
   
    public $table = 'detalleventa';
    public $timestamps = true;
    protected $fillable = ['id', 'venta_id', 'producto_id','precio','cantidad', 'descuento', 'isv','subtotal','estado'];
}
