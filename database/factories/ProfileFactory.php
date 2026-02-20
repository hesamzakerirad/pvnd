<?php

namespace Database\Factories;

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
        $links = [];
        $randomNumberOfLinks = random_int(3, 6);

        for ($counter = 1; $counter <= $randomNumberOfLinks; $counter++) {
            $links[] = [
                'label' => fake()->words(random_int(1, 2), true),
                'location' => fake()->url(),
            ];
        }

        return [
            'title' => fake()->name(),
            'label' => fake()->words(random_int(1, 4), true),
            'position' => fake()->words(random_int(1, 4), true),
            'uri' => fake()->unique()->word(),
            'bio' => fake()->sentences(random_int(1, 5), true),
            'links' => $links,
            'is_public' => fake()->boolean(),
        ];
    }
}
