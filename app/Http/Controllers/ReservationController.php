<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Passenger;
use App\Models\Flight;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */     
    public function index()
    {
        // On récupère toutes les réservations avec les relations nécessaires
        $reservations = Reservation::with(['passenger.user', 'flight'])->get();

        if (!$reservations) {
            abort(404, "Réservation non trouvée.");
        }
        // On retourne la vue avec les données
        return view('dashboard.reservation.index', compact('reservations'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }
    

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {

    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {

    }
    
}
