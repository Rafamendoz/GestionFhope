<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
   public $timestamps = true;
   protected $filliable = ['id', 'puesto_nombre', 'estado'];
}
