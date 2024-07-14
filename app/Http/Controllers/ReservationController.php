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
        // Récupérer toutes les réservations pour l'utilisateur authentifié
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create($id)
    {
        // Trouver l'événement par son ID
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Événement non trouvé');
        }
        return view('portail.index', compact('evenement'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Trouver l'événement correspondant
        $evenement = Evenement::findOrFail($request->evenement_id);

        // Vérifier si la date limite est passée
        if (Carbon::now()->gt($evenement->date_limite)) {
            return redirect()->back()->with('error', 'La date limite pour les réservations de cet événement est dépassée.');
        }

        // Vérifier s'il reste des places disponibles
        $reservationsCount = Reservation::where('evenement_id', $evenement->id)->count();
        if ($reservationsCount >= $evenement->places_disponible) {
            return redirect()->back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
        }

        // Créer la réservation
        $reservation = new Reservation();
        $reservation->evenement_id = $evenement->id;
        $reservation->user_id = $request->user_id;
        $reservation->statut = 'accepter';
        $reservation->save();

        // Envoyer un email de confirmation
        Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

        return redirect()->back()->with('success', 'Réservation effectuer avec succès.');
    }

    public function show($id)
    {
        // Trouver l'événement par son ID
        $evenement = Evenement::find($id);
        if (!$evenement) {
            return redirect()->back()->with('error', 'Événement non trouvé');
        }

        // Obtenir le nombre de réservations pour l'événement
        $reservationsCount = Reservation::where('evenement_id', $evenement->id)->count();

        // Passer l'événement et le nombre de réservations à la vue
        return view('portail.detailsEvents', compact('evenement', 'reservationsCount'));
    }

    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        // Valider les données du formulaire
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'user_id' => 'required|exists:users,id',
            'statut' => 'required|string',
        ]);

        // Mettre à jour la réservation
        $reservation->update($request->all());
        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        // Supprimer la réservation
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }

    public function approveReservation($id)
    {
        // Approuver la réservation
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'approuvé';
        $reservation->save();

        // Envoyer un email de confirmation
        Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

        return response()->json(['success' => 'Réservation approuvée avec succès !']);
    }

    public function rejectReservation($id)
    {
        // Refuser la réservation
        $reservation = Reservation::findOrFail($id);
        $reservation->statut = 'refusé';
        $reservation->save();

        // Envoyer un email de notification
        Mail::to($reservation->user->email)->send(new ReservationMail($reservation));

        return response()->json(['success' => 'Réservation refusée !']);
    }

    public function getReservationCount($evenementId)
    {
        // Obtenir le nombre de réservations pour l'événement
        $reservationsCount = Reservation::where('evenement_id', $evenementId)->count();
        $evenement = Evenement::findOrFail($evenementId);
        $placesRestantes = $evenement->places_disponible - $reservationsCount;

        return response()->json([
            'reservationsCount' => $reservationsCount,
            'placesRestantes' => $placesRestantes
        ]);
    }

    public function showAcceptedReservations($evenementId)
    {
        // Afficher les réservations acceptées pour l'événement
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
        // Afficher les réservations refusées pour l'événement
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
