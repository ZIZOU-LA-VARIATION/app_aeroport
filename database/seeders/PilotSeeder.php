<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Pilot;
use App\Models\User;
use App\Models\Role;

class PilotSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Récupérer les utilisateurs ayant le rôle "pilot"
        $pilotRole = Role::where('name', 'pilot')->first();
        $users = User::where('role_id', $pilotRole->id)->get();

        foreach ($users as $user) {
            Pilot::create([
                'licence' => strtoupper($faker->bothify('LIC-####')),
                'experience' => $faker->randomElement(['Beginner', 'Intermediate', 'Expert']),
                'user_id' => $user->id, // Associer chaque pilote à son utilisateur
            ]);
        }
    }
}
