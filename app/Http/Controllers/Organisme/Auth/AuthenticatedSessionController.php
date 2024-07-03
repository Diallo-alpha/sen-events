<?php

namespace App\Http\Controllers\Organisme\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\OrganisationLoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('organisme.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(OrganisationLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('organisme.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('organisme')->logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('portail.index');
    }
}
