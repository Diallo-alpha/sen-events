<?php

namespace App\Http\Controllers;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationStatutMail;
use Illuminate\Support\Facades\Mail;
// use App\Mail\ReservationCreated;

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

        // Définir la valeur par défaut pour 'statut'
        $reservationData = $request->all();
        $reservationData['statut'] = $reservationData['statut'] ?? 'accepter';

        $reservation = Reservation::create($reservationData);

        // Envoyer un email de confirmation
        // Mail::to(auth()->user()->email)->send(new ReservationCreated($reservation));

        return redirect()->route('portail.index')
                         ->with('success', 'Réservation créée avec succès.');
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

    public function approveReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'approuvé';
        $reservation->save();

        Mail::to($reservation->auteur_email)->send(new  ReservationStatutMail($reservation, 'approuvé'));

        // return redirect()->route('reservations.index')->with('success', 'Reservation approuvée avec succès !');

        return redirect('back')->with('success', 'Reservation approuvée avec succès !');

    }

    public function rejectReservation($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'refusé';
        $reservation->save();
        Mail::to($reservation->user->email)->send(new ReservationStatutMail($reservation, 'refusé'));

        // return redirect()->route('reservations.index')->with('success', 'Reservation refusée avec succès !');
        return redirect('back')->with('success', 'Reservation refusée avec succès !');

    }
    
}
