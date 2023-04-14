<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
   public $table = 'puesto';
   public $timestamps = true;
   protected $fillable = ['id', 'puesto_nombre', 'estado'];
}
