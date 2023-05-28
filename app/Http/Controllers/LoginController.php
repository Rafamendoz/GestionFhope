<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Error;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class LoginController extends Controller
{
    public function login(Request $request){
        try {

            $credenciales = [
                'user'=> $request->user,
                'password'=> $request->password
            ];
            Log::info("REQUEST: ".$request);
    
            $remember = ($request->has('remember')? true : false);
            $prevalidate = User::where('user', $request->user)->where('estado',1)->get();
            if(sizeof($prevalidate)==0 || empty($prevalidate) || is_null($prevalidate)){
                return redirect('/');
            }else{
                    if(Auth::attempt($credenciales, $remember)){
                        Log::info("ACCESO PERMITIDO");

                        return redirect()->intended('clientes');
            
                    }else{
                        Log::info("ACCESO DENEGADO");
                        Log::info($prevalidate);
                        return redirect('/');
                    }
            
    
            }
            
        } catch (\Throwable $th) {
            Log::error("Codigo de error: ".$th->getCode()." Mensaje: ".$th->getMessage());
            $error = Error::where('codigo_error',$th->getCode())->get();
            return response()->json(["Estado"=>"Fallido","Codigo"=>500, "Mapping_Error"=>$error],500);
        }
    
    }

        public function logout(Request $request){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
    
        }
}
