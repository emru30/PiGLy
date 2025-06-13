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
            'user_id' => \App\Models\User::factory(),
            'date' => $this->faker->dateTimeBetween('-35 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(2, 45, 65),
            'calories' => $this->faker->numberBetween(1500, 2500),
            'exercise_time' => function () {
                $minutes = $this->faker->numberBetween(0, 120);
                $hours = floor($minutes / 60);
                $minutes = $minutes % 60;
                return sprintf('%02d:%02d', $hours, $minutes);
            },
            'exercise_content' => $this->faker->randomElement(['ウォーキング', 'ランニング', '筋トレ', 'ヨガ', null]),
        ];
    }
}
