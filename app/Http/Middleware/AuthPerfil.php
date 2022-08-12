<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthPerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $idPerfilLogin = session('idPerfilLogin');
        if ($idPerfilLogin) {
            return $next($request);
        } else {
            return redirect(route("acceso_estudiantes", ["type" => "login"]));
        }
    }
}
