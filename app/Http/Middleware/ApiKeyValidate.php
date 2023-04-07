<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->has("api_key")) {
            return response()->json([
              'status' => 401,
              'message' => 'Acceso no autorizado',
            ], 401);
          }
      
          if ($request->has("api_key")) {
            $api_key = "key_cur_prod_fnPqT5xQEi5Vcb9wKwbCf65c3BjVGyBB";
            if ($request->input("api_key") != $api_key) {
              return response()->json([
                'status' => 401,
                'message' => 'Acceso no autorizado',
              ], 401);
            }
          }
      
          return $next($request);
        
    }
}
