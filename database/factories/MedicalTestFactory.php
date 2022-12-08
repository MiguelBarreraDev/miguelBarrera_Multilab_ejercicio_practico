<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalTest>
 */
class MedicalTestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence($nbWords = 4, $variableNbWords = true),
            'description' => fake()->realText($maxNbChars = 100),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200),
        ];
    }
}
