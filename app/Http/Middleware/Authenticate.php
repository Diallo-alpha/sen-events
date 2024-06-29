<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach($guards as $guard)
        if(Auth::guard($guard)->check())
            {
                Auth::shouldUse($guard);
                return $next($request);
            }


        $this->unauthenticated($guards);
    }
    protected function unauthenticated(array $guards)
    {
        throw new AuthenticationException(
            'Unauthenticated', $guards, $this->redirectTo()
        );
    }

    public function redirectTo()
        {
            if(Route::is('admin.*'))
                {
                    return route('admin.login');
                }

            return route('login');
        }
}
