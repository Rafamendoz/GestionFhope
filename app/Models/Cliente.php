<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamp = true;
    protected $fillable = ['id', 'cliente_nom','cliente_tel','cliente_correo','cliente_DNI','estado'];
}
