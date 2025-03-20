<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
use Faker\Factory as Faker;

class FoodSeeder extends Seeder
{
    public function run()
    {
        Food::factory()->count(10)->create();
    }
}
