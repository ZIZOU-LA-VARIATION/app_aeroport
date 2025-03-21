<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Vérifier si les rôles existent
        $passagerRole = Role::where('name', 'passenger')->first();
        $pilotRole = Role::where('name', 'pilot')->first();

        if (!$passagerRole || !$pilotRole) {
            dd('Les rôles "passager" et "pilot" n\'existent pas. Vérifie la table roles.');
        }

        // Créer 10 utilisateurs avec le rôle "passager"
        foreach (range(1, 10) as $_) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail, // Email unique
                'phone' => $faker->phoneNumber, // Ajout du numéro de téléphone
                'password' => bcrypt('password'),
                'role_id' => $passagerRole->id,
            ]);
        }

        // Créer 5 utilisateurs avec le rôle "pilot"
        foreach (range(1, 5) as $_) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'password' => bcrypt('password'),
                'role_id' => $pilotRole->id,
            ]);
        }
    }
}
