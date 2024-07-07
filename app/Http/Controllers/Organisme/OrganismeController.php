<?php

namespace App\Http\Controllers\Organisme;

use App\Models\Evenement;
use App\Models\Organisme;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrganismeController extends Controller
{
    private function getOrganismeCounters()
    {
        $organismeId = Auth::id();
        $evenementsCount = Evenement::where('organisme_id', $organismeId)->count();
        $reservationsCount = Reservation::whereHas('evenement', function ($query) use ($organismeId) {
            $query->where('organisme_id', $organismeId);
        })->count();

        return [$evenementsCount, $reservationsCount];
    }

    // View dashboard organisme
    public function index()
    {
        $organisme = Auth::user()->organisme;
        list($evenementsCount, $reservationsCount) = $this->getOrganismeCounters();
        return view('organisme.dashboard', compact('organisme','evenementsCount', 'reservationsCount'));
    }

    // View inscrit organisme
// View inscrit organisme
// View inscrit organisme
public function inscrit($evenementId)
{
    $evenement = Evenement::findOrFail($evenementId);
    $organismeId = Auth::id();

    // Récupérer les réservations pour cet événement avec les utilisateurs associés
    $reservations = Reservation::where('evenement_id', $evenementId)->with('user')->get();

    foreach ($reservations as $reservation) {
        $reservationId = $reservation->id;
        // Utilisez $reservationId comme nécessaire
    }
        // dd($reservationId);

    // Calculer le nombre de réservations pour cet événement
    $reservationsCount = $reservations->count();

    // Calculer le nombre de places restantes
    $placesRestantes = $evenement->places_disponible - $reservationsCount;

    // Récupérer le nombre total d'événements pour l'organisme
    $evenementsCount = Evenement::where('organisme_id', $organismeId)->count();
    return view('organisme.inscrit', [
        'evenement' => $evenement,
        'reservations' => $reservations,
        'placesRestantes' => $placesRestantes,
        'reservationsCount' => $reservationsCount,
        'evenementsCount' => $evenementsCount,
        // 'reservationId' => $reservationId,
    ]);
}




    // View evenements
    public function evenements()
    {
        $organismeId = Auth::id();
        $evenements = Evenement::where('organisme_id', $organismeId)->get();
        list($evenementsCount, $reservationsCount) = $this->getOrganismeCounters();
        return view('organisme.evenement', compact('evenements', 'evenementsCount', 'reservationsCount'));
    }

    public function create()
    {
        return view('evenements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'secteur_activite' => 'required',
            'ninea' => 'required',
            'date_creation' => 'required|date',
        ]);

        Organisme::create($request->all());

        return redirect()->route('organismes.index')->with('success', 'Organisme created successfully.');
    }

    public function show(Organisme $organisme)
    {
        return view('organismes.show', compact('organisme'));
    }

    public function edit(Organisme $organisme)
    {
        return view('organismes.edit', compact('organisme'));
    }

    public function update(Request $request, Organisme $organisme)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'secteur_activite' => 'required',
            'ninea' => 'required',
            'date_creation' => 'required|date',
        ]);

        $organisme->update($request->all());

        return redirect()->route('organismes.index')->with('success', 'Organisme updated successfully.');
    }

    public function destroy(Organisme $organisme)
    {
        $organisme->delete();

        return redirect()->route('organismes.index')->with('success', 'Organisme deleted successfully.');
    }
}
