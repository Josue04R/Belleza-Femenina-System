<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Verifica si el cliente ha iniciado sesión antes de permitir el acceso.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  \Closure  $next
 * @return mixed
 */
class AuthCliente
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('cliente_id')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        return $next($request);
    }
}
