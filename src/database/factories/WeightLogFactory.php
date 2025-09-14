<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
{
    return [
        'user_id' => 1, // 後でseeder内で上書き
        'date' => $this->faker->unique()->dateTimeBetween('-35 days', 'now')->format('Y-m-d'),
        'weight' => $this->faker->randomFloat(1, 45, 65),
        'calories' => $this->faker->numberBetween(1000, 3000),
        'exercise_time' => $this->faker->time('H:i:s'),
    ];
}
}
