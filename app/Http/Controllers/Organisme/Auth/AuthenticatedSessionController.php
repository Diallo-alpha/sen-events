<?php

namespace App\Http\Controllers\Organisme\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\OrganisationLoginRequest;
use App\Models\Organisme;

class AuthenticatedSessionController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function create()
    {
        return view('organisme.auth.login');
    }
    public function store(OrganisationLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // Récupérer l'organisme authentifié
        $organisme = Auth::guard('organisme')->user();

        // Stocker l'ID de l'organisme dans la session
        if ($organisme) {
            session(['organisme_id' => $organisme->id]);
        }

        $request->session()->regenerate();

        return redirect()->route('organisme.dashboard');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('organisme')->logout();

        // Supprimer l'ID de l'organisme de la session
        $request->session()->forget('organisme_id');

        $request->session()->regenerateToken();

        return redirect()->route('portail.index');
    }
}
