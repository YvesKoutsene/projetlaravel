<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et est un administrateur
        if ($request->user() && $request->user()->usertype === 'admin') {
            return $next($request);
        }

        // Redirige l'utilisateur vers une page d'erreur ou une autre action appropriée
        return redirect()->route('dashboard')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette ressource.');
    }

}
