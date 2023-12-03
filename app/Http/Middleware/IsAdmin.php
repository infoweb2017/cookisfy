<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     *Gestionar una solicitud entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Validar que el usuario sea administrador
        //Si no lo es devuelve o retorna un error

        if (auth()->check() && auth()->user()->isAdmin()) {
            return $next($request);
        } 
            //Log::info('Usuario autenticado:', ['user' => auth()->user()]);
            abort(403);

            //return redirect('home_admin')->with('error', 'Acceso no autorizado.');
        
    }
}
