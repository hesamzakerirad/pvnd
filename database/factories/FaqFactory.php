<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => fake()->sentence(),
            'answer' => fake()->sentence(),
            'group' => fake()->randomElement(['general', 'link', 'profile']),
            'order' => fake()->randomDigit(),
            'is_visible' => fake()->boolean(),
        ];
    }
}
