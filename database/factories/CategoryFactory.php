<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $array = ['rau', 'củ', 'trái cây'];
        return [
            'name' =>$this->faker->unique()->randomElement($array),
        ];
    }
}
