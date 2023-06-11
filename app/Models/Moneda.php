<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    public $table = 'moneda';
    protected $fillable = ['id', 'moneda_nombre','estado'];

}
