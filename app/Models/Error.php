<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Error extends Model
{
    public $table = 'errores';
   public $timestamp = true;
    public $incrementing = false;
    public $fillable = ['codigo_error', 'descripcion'];
}
