<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    public $table = "cuenta";
   public $timestamps = true;
   protected $fillable = ['id', 'cuenta_nombre', 'estado'];
}
