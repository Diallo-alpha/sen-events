<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationCreated;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create($id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Événement non trouvé');
        }
        return view('portail.index', compact('evenement'));
    }

        public function store(Request $request)
        {
            $request->validate([
                'evenement_id' => 'required',
                'user_id' => 'required',
            ]);

            $evenement = Evenement::findOrFail($request->evenement_id);

            // Vérifier si la date limite est dépassée
            if (Carbon::now()->gt($evenement->date_limite)) {
                return back()->with('error', 'La date limite pour les réservations de cet événement est dépassée.');
            }

            // Vérifier s'il reste des places disponibles
            $reservationsCount = Reservation::where('evenement_id', $evenement->id)->count();
            if ($reservationsCount >= $evenement->places_disponible) {
                return back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
            }

            // Créer la réservation
            $reservation = new Reservation();
            $reservation->evenement_id = $evenement->id;
            $reservation->user_id = $request->user_id;
            $reservation->statut = 'accepter'; // Par défaut, à ajuster selon ta logique
            $reservation->save();

            // Envoi d'un email de confirmation (exemple)
            // Mail::to($reservation->user->email)->send(new ReservationCreated($reservation));

            return redirect()->route('portail.index')->with('success', 'Réservation créée avec succès.');
        }

    public function show($id)
    {
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Événement non trouvé');
        }
        return view('portail.detailsEvents', compact('evenement'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
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
