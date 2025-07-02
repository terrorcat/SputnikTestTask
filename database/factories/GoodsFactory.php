<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->lexify('test_????????'),
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}
