<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Admin;
use App\Models\Organisme;
use App\Models\User;

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
            return redirect()->intended(route('admin.dashboard'));
        } elseif ($this->attemptLogin($credentials, 'organisme', 'organisme.dashboard')) {
            return redirect()->intended(route('organisme.dashboard'));
        } elseif ($this->attemptLogin($credentials, 'web', 'portail.index')) {
            return redirect()->intended(route('portail.index'));
        }

        return back()->withErrors([
            'email' => 'Les informations d\'identification ne correspondent pas.',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     */
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
        $guard = session('guard', 'web');
        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

