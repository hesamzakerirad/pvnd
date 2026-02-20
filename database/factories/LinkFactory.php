<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => null,
            'label' => fake()->optional()->words(random_int(1, 3), true),
            'uri' => str_replace('.', '', fake()->unique()->text(config('variables.short_link_length') + 1)),
            'location' => fake()->url(),
            'redirect_http_code' => (string) fake()->randomElement([301, 302, 307, 308]),
            'add_utm_tags' => fake()->boolean(20),
            'is_created_using_api' => fake()->boolean(40),
            'expired_at' => fake()->optional()->dateTimeBetween(now(), now()->addDays(30)),
        ];
    }
}
