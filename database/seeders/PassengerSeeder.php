<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Passenger;
use App\Models\Role;
use Faker\Factory as Faker;

class PassengerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Récupérer l'ID du rôle "passenger" depuis la table `roles`
        $passengerRole = Role::where('name', 'passenger')->first();

        if (!$passengerRole) {
            $this->command->warn("⚠️  Le rôle 'passenger' n'existe pas dans la table 'roles'.");
            return;
        }

        // Récupérer tous les utilisateurs ayant ce rôle
        $users = User::where('role_id', $passengerRole->id)->get();

        if ($users->isEmpty()) {
            $this->command->warn("⚠️  Aucun utilisateur avec le rôle 'passenger' trouvé.");
            return;
        }

        foreach ($users as $user) {
            Passenger::create([
                'adresse' => $faker->address,
                'user_id' => $user->id, // Associer chaque passager à son utilisateur
            ]);
        }

        $this->command->info("✅ Seeder PassengerSeeder exécuté avec succès !");
    }
}

