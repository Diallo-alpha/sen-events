<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if ($this->attemptLogin($credentials, 'admins', 'admin.dashboard')) {
            $user = Auth::guard('admins')->user();
            // dd($user); // Affiche les détails de l'admin connecté
            return redirect()->route('admin.evenements');
        } elseif ($this->attemptLogin($credentials, 'organisme', 'organisme.dashboard')) {
            $user = Auth::guard('organisme')->user();
            // dd($user); // Affiche les détails de l'organisme connecté
            return redirect()->route('organisme.dashboard');
        } elseif ($this->attemptLogin($credentials, 'web', 'portail.index')) {
            $user = Auth::guard('web')->user();
            // dd($user); // Affiche les détails de l'utilisateur connecté
            return redirect()->route('portail.index');
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }
    protected function attemptLogin($credentials, $guard, $redirectRoute)
    {
        if (Auth::guard($guard)->attempt($credentials)) {
            session(['guard' => $guard]);
            return true;
        }
        return false;
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $guard = $request->route()->getName();
        switch ($guard) {
            case 'web.logout':
                $guard = 'web';
                break;
            case 'admin.logout':
                $guard = 'admins';
                break;
            case 'organisme.logout':
                $guard = 'organisme';
                break;
            default:
                $guard = 'web';
                break;
        }

        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
