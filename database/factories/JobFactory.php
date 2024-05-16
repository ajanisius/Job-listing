<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$ 50.000', '$ 55.000', '$ 20.000', '$ 90.000', '$ 100.000', '$ 43.000', '$ 770.000', '$ 888.000', '$ 123.000',]),
            'description' => fake()->paragraph(),
            'location' => fake()->country(),
            'schedule' => fake()->randomElement(['Part Time', 'Full Time']),
            'url' => fake()->url(),
            'featured' => fake()->randomElement([true, false]),

        ];
    }
}
