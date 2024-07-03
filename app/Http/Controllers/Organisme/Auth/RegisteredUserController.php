<?php
namespace App\Http\Controllers\Organisme\Auth;

use App\Http\Controllers\Controller;
use App\Models\Organisme;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{
    public function createOrganisme()
    {
        return view('organisme.auth.register');
    }

    public function storeOrganisme(Request $request)
    {
        Log::info('storeOrganisme started');

        $validated = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'ninea' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'max:12048'],
            'adresse' => ['required', 'string', 'max:255'],
            'secteur' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:organismes'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Log::info('Validation passed', ['validated' => $validated]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos');
            Log::info('Logo uploaded', ['logoPath' => $logoPath]);
        }

        try {
            $organisme = Organisme::create([
                'nom' => $validated['nom'],
                'ninea' => $validated['ninea'],
                'logo' => $logoPath,
                'adresse' => $validated['adresse'],
                'secteur_activite' => $validated['secteur'],
                'date_creation' => $validated['date'],
                'description' => $validated['description'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            Log::info('Organisme created', ['organisme' => $organisme]);

            event(new Registered($organisme));

            Auth::guard('organisme')->login($organisme);

            Log::info('User logged in', ['user' => Auth::guard('organisme')->user()]);

            return redirect()->route('evenement.create')->with('success', 'Organisme créé avec succès!');
        } catch (\Exception $e) {
            Log::error('Error creating organisme', ['error' => $e->getMessage()]);
            return back()->withErrors(['msg' => 'Une erreur s\'est produite lors de la création de l\'organisme.'])->withInput();
        }
    }
}

