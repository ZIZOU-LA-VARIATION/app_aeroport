<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Reservation;
use App\Models\Passenger;
use App\Models\Vol;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Récupérer tous les passagers et vols existants
        $passengers = Passenger::all();
        $flights = Flight::all();
        
        foreach (range(1, 10) as $index) {
            $passenger = $passengers->random(); // Sélectionner un passager aléatoire
            $flight = $flights->random(); // Sélectionner un vol aléatoire
            
            Reservation::create([
                'passenger_id' => $passenger->id, // Associer une réservation à un passager
                'flight_id' => $flight->id, // Associer une réservation à un vol
                'status' => $faker->randomElement(['unpaid', 'paid']),
                'paiment_detail' => $faker->sentence,
            ]);
        }
    }
}
