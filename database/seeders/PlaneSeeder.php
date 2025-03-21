<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Plane;

class PlaneSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        foreach (range(1, 3) as $index) {
            Plane::create([
                'mark' => $faker->word,
                'made_year' => $faker->date('Y-m-d', 'now'),
                'capacity' => $faker->numberBetween(10, 200),
                'type' => $faker->randomElement(['long-courier', 'cour-courier']),
                'state' => $faker->boolean,
            ]);
        }
    }
}
