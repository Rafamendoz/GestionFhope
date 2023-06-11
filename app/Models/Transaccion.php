<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    public $table = 'transaccion';
    public $timestamp = 'true';
    protected $fillable = ['id','trans_nombre','estado'];
}
