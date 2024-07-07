<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationMail;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        // Retrieve all reservations for the authenticated user
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create($id)
    {
        // Find the event by its ID
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Événement non trouvé');
        }
        return view('portail.index', compact('evenement'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Find the corresponding event
        $evenement = Evenement::findOrFail($request->evenement_id);

        // Check if the deadline has passed
        if (Carbon::now()->gt($evenement->date_limite)) {
            return back()->with('error', 'La date limite pour les réservations de cet événement est dépassée.');
        }

        // Check if there are available spots
        $reservationsCount = Reservation::where('evenement_id', $evenement->id)->count();
        if ($reservationsCount >= $evenement->places_disponible) {
            return back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
        }

        // Create the reservation
        $reservation = new Reservation();
        $reservation->evenement_id = $evenement->id;
        $reservation->user_id = $request->user_id;
        $reservation->statut = 'accepter';
        $reservation->save();

        // Send a confirmation email
        Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

        return redirect()->route('portail.index')->with('success', 'Réservation créée avec succès.');
    }

    public function show($id)
    {
        // Find the event by its ID
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
        // Validate the form data
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'user_id' => 'required|exists:users,id',
            'statut' => 'required|string',
        ]);

        // Update the reservation
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        // Delete the reservation
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }
                        public function approveReservation($id)
                        {
                            $reservation = Reservation::findOrFail($id);
                            $reservation->statut = 'approuvé';
                            $reservation->save();

                            Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

                            return back()->with('success', 'Réservation approuvée avec succès !');
                        }

                        public function rejectReservation($id)
                        {
                            $reservation = Reservation::findOrFail($id);
                            $reservation->statut = 'refusé';
                            $reservation->save();

                            Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

                            return back()->with('success', 'Réservation refusée avec succès !');
                        }

                        public function showAcceptedReservations($evenementId)
                        {
                            $evenement = Evenement::findOrFail($evenementId);
                            $reservations = Reservation::where('evenement_id', $evenementId)
                                                       ->where('statut', 'approuvé')
                                                       ->get();
                            $reservationsCount = $reservations->count();
                            $evenementsCount = Evenement::count();
                            $placesRestantes = $evenement->places_disponible - $reservationsCount;

                            return view('organisme.dashboard_accepted', compact('evenement', 'reservations', 'reservationsCount', 'evenementsCount', 'placesRestantes'));
                        }

                        public function showRejectedReservations($evenementId)
                        {
                            $evenement = Evenement::findOrFail($evenementId);
                            $reservations = Reservation::where('evenement_id', $evenementId)
                                                       ->where('statut', 'refusé')
                                                       ->get();
                            $reservationsCount = $reservations->count();
                            $evenementsCount = Evenement::count();
                            $placesRestantes = $evenement->places_disponible - $reservationsCount;

                            return view('organisme.dashboard_rejected', compact('evenement', 'reservations', 'reservationsCount', 'evenementsCount', 'placesRestantes'));
                        }



}
