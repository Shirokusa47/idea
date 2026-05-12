<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Idea;
use App\Models\step;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<step>
 */
class StepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idea_id' => Idea::factory(),
            'description' => fake()->sentence(),
            'completed' => false,
        ];
    }
}
