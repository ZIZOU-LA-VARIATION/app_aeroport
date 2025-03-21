<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->roles();
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
