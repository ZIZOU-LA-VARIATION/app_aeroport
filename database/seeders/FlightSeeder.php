<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Flight;
use App\Models\Plane;
use App\Models\Pilot;

class FlightSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Vérifier s'il y a des avions et des pilotes
        $planes = Plane::all();
        $pilots = Pilot::all();

        if ($planes->isEmpty() || $pilots->isEmpty()) {
            dd("Les tables 'planes' ou 'pilots' sont vides. Exécute d'abord leurs seeders.");
        }

        foreach (range(1, 10) as $_) {
            Flight::create([
                'plane_id' => $planes->random()->id,
                'pilot_id' => $pilots->random()->id,
                'number' => $faker->randomNumber(5, true),
                'dep_aiport' => $faker->city,
                'arr_aiport' => $faker->city,
                'dep_time' => $faker->time,
                'arr_time' => $faker->time,
                'status' => $faker->randomElement(['planned', 'processing', 'fenced', 'canceled']),
            ]);
        }
    }
}
