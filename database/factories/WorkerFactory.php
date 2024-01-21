<?php

namespace Database\Factories;

use App\Models\Profession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'profession_id' => Profession::inRandomOrder()->first()->id,
            'name' => fake()->name,
            'surname' => fake()->lastName,
            'email' => fake()->unique()->safeEmail(),
            'age' => fake()->numberBetween(18, 60),
            'description' => fake()->text(300),
            'is_married' => fake()->boolean,
        ];
    }
}
