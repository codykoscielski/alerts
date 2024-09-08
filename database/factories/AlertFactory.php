<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alert>
 */
class AlertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'headline' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'severity' => $this->faker->randomElement(['info', 'warning', 'danger', 'info']),
            'author' => $this->faker->name,
            'url_title' => $this->faker->sentence,
            'url' => $this->faker->url,
        ];
    }
}
