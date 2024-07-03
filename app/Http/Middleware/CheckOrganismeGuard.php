<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOrganismeGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        // Vérifiez si l'utilisateur possède le garde "organisme"
        if (Auth::user()->guard !== 'organisme') {
            return redirect()->route('portail.index')->with('error', 'Vous n\'êtes pas autorisé à accéder à cette page.');
        }

        return $next($request);
    }
}
