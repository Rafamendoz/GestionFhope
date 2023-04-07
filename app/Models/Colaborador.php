<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    public $timestamp = true;
    protected $fillable = ['id', 'colaborador_nombres', 'colaborador_apellidos', 'colaborador_DNI', 'colaborador_puesto', 'colaborador_idusuario', 'estado'];
}
