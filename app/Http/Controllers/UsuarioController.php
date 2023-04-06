<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function getUsuario(){
    return response()->json(Usuario::all(),200);
   }

   public function getUsuarioById($id){
    return response()->json(Usuario::find($id),200);
   }
}
