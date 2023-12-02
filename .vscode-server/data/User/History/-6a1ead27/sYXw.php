<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => fake()->paragraph(),
            'used_time' => fake()->numberBetween(1,60),
            'user_id' => fake()->numberBetween(1,5),
            'incident_id' => fake()->numberBetween(1,20)
        ];
    }
}