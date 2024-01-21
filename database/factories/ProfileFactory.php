<?php

namespace Database\Factories;

use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'workers_id' => Worker::factory()->create(),
            'address' => fake()->address,
            'experience' => fake()->numberBetween(0,20),
            'finished_study_at' => fake()->date,
        ];
    }
}
