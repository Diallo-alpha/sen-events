<?php
// app/Http/Controllers/ReservationController.php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    // ...

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
    
// ...
    
    // ReservationController.php
    // ...

    public function showAcceptedReservations($evenementId)
    {
        $evenement = Evenement::findOrFail($evenementId);
        $reservations = Reservation::where('evenement_id', $evenementId)
                                   ->where('statut', 'accepter')
                                   ->get();
        $reservationsCount = $reservations->count();
        $evenementsCount = Evenement::count();
        $placesRestantes = $evenement->places_disponible - $reservationsCount;

        return view('organisme.dashboard', compact('evenement', 'reservations', 'reservationsCount', 'evenementsCount', 'placesRestantes'));
    }

    // ...
}

