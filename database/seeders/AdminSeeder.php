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
        $this->roles();
        $this->users();
    }

    public function users(){
        //Find role that the name is equals to 'admin'
        $roleAdmin = Role::query()->where('name', 'admin')->first();

        if($roleAdmin){
            //Create user account
            $user = new User();
            $user->name = 'Locahost Academy';
            $user->email = 'locahost@academy.com';
            $user->password = Hash::make('Admin@2025');
            $user->phone = '6777777777';
            $user->role_id = $roleAdmin->id;
            $user->save();


            /**
             * Create the Admin entity to link with user;
             * That means , and admin has an user account.
            */
            $admin = new Admin();
            $admin->user_id = $user->id;
            $admin->code = 'Admin127';
            $admin->save();
        }

    }

    public function roles(){
        //Initialize all roles tables
        $roles = [
          [
            'name' => 'admin',
            'description' => 'Admin Role'
          ]  ,
          [
            'name' => 'pilot',
            'description' => 'Pilot Role'
          ]  ,
          [
            'name' => 'passenger',
            'description' => 'Passenger Role'
          ] 
        ];

        foreach ($roles as $data) {

            //Insert each role in DataBase
            $role =  new Role();
            
            $role->name= $data['name'];
            $role->description=$data['description'];
            $role->save();
        }

    }
}
 