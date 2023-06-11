<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolesSecurit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rol_actual = ModelHasRoles::where('model_id', auth()->user()->id)->join('users', 'users.id' , '=','model_has_roles.model_id')->join('roles', 'roles.id' , '=','model_has_roles.role_id')->select('roles.name')->get();
        if (auth()->check() && $rol_actual[0]['name'] == "SuperAdministrador" || $rol_actual[0]['name'] == "Administrador"){
            return $next($request);

        }else{
            abort(403, 'ACCESO NO AUTORIZADO. ');
        }
    }
}
