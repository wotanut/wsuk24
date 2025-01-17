<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\competitors>
 */
class CompetitorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'country_code' => fake()->countryCode(),
            'skill_id' => fake()->numberBetween(1,3),
            'score' => fake()->numberBetween(0,100),
        ];
    }
}
