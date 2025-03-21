<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
  
    $this->users();
  }

  public function users()
  {
    $roleAdmin = Role::where('name', 'admin')->first();

    if ($roleAdmin) {
      $user = User::firstOrCreate(
        ['email' => 'locahost@academy.com'], // Vérifie si l'email existe déjà
        [
          'name' => 'Locahost Academy',
          'password' => Hash::make('Admin@2025'),
          'phone' => '6777777777',
          'role_id' => $roleAdmin->id
        ]
      );

      Admin::firstOrCreate(['user_id' => $user->id], ['code' => 'Admin127']);
    }
  }


  public function roles()
  {
    //Initialize all roles tables
    $roles = [
      [
        'name' => 'admin',
        'description' => 'Admin Role'
      ],
      [
        'name' => 'pilot',
        'description' => 'Pilot Role'
      ],
      [
        'name' => 'passenger',
        'description' => 'Passenger Role'
      ]
    ];

    foreach ($roles as $data) {
      Role::firstOrCreate(['name' => $data['name']], ['description' => $data['description']]);
    }


  }
}
