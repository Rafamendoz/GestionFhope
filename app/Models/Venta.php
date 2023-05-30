<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   
    public $table = 'venta';
    public $timestamps = true;
    protected $fillable = ['id', 'cliente_id', 'usuario_id','fecha','direccionEnvio', 'total', 'estado'];
}
