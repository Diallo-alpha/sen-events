<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
class ReservationController extends Controller

{
    public function approveReservation()
    {
        $reservation = Reservation::where('status', 'accepted')->get();
        return view('inscrit_acccepter', compact('reservations'));
    }

    public function rejectReservation()
    {
        $reservation = Reservation::where('status', 'rejected')->get();
        return view('inscrit_refuser', compact('reservations'));
    }
}


