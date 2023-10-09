<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Incident>
 */
class IncidentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'text' => fake()->sentence(),
            'stimated_time' => fake()->numberBetween(5,60),
            'user_id' => fake()->numberBetween(1,5),
            'department_id' => fake()->numberBetween(1,5),
            'category_id' => fake()->numberBetween(1,5)
        ];
    }
}
