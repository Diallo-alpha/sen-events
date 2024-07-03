<?php
namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('portail.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('portail.reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'evenement_id' => 'required',
            'user_id' => 'required',
            'statut' => 'required',
        ]);

        Reservation::create($request->all());
        return redirect()->route('reservations.index')
                         ->with('success', 'Réservation créée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        return view('portail.reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('portail.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'evenement_id' => 'required',
            'user_id' => 'required',
            'statut' => 'required',
        ]);

        $reservation->update($request->all());
        return redirect()->route('reservations.index')
                         ->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')
                         ->with('success', 'Réservation supprimée avec succès.');
    }
}
