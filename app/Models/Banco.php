<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $table = 'banco';
    public $timestamp = true;
    protected $fillable = ['id', 'banco_cuenta', 'banco_nombre','banco_tipoCuenta','banco_tipoMoneda','banco_total','estado'];
}
