<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
        }
        
        // Récupération du statut de l'utilisateur connecté
        $admin = Auth::user()->admin;

        if ($admin != 1) {
            return redirect()->route('login')->with('error', 'Cette page nécessite un compte administrateur.'); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté en tant qu'admin
        }

        return $next($request);
    }
}
