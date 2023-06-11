<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::onceBasic()){
            return response()->json(['Codigo'=>401, 'Estado'=>'No Autorizado', 'Descripcion'=>'Acceso No Autorizado'],401);
        }else{
            return $next($request);

        }
    }
}
