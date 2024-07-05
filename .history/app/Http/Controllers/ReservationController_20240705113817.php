<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Mail\ReservationCreated;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index()
    {
        // Récupérer toutes les réservations de l'utilisateur connecté
        $reservations = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    // public function index()
    // {
    //     $evenements = Evenement::with('reservations.user')->get();
    //     $reservationsCount = Reservation::count();
    //     $evenementsCount = Evenement::count();

    //     return view('organisme.dashboard', compact('evenements', 'reservationsCount', 'evenementsCount'));
    // }

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
        $reservation->statut = 'accepter';
        $reservation->save();

        // Envoi d'un email de confirmation (exemple)
        // Mail::to($reservation->user->email)->send(new ReservationCreated($reservation));

        return redirect()->route('portail.index')->with('success', 'Réservation créée avec succès.');
    }

    public function show($id)
    {
        // Trouver l'événement par son ID
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
        $reservation = Reservation::findOrFail($id);
        $idee->status = 'approuvé';
        $idee->save();

        Mail::to($idee->auteur_email)->send(new IdeaStatusMail($idee, 'approuvé'));

        return redirect()->route('idees.index')->with('success', 'Idée approuvée avec succès !');
    }

    public function rejectIdea($id)
    {
        $idee = Idee::findOrFail($id);
        $idee->status = 'refusé';
        $idee->save();

        Mail::to($idee->auteur_email)->send(new IdeaStatusMail($idee, 'refusé'));

        return redirect()->route('idees.index')->with('success', 'Idée refusée avec succès !');
    }
}

}
