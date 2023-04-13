<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $table = "estado";
    public $timestamp = true;
    protected $fillable = ['id', 'valor'];

}
