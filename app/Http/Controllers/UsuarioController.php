<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use App\Models\Usuario;


class UsuarioController extends Controller
{
    public function getUsuario(){
        $data = Usuario::all();
        return view('usuarios', compact('data'));
    
   }




  

   
}
