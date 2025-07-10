<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'dateTime' => fake()->dateTimeThisYear(),
            'location' => fake()->city(),
            'type' => fake()->word(),
            'description' => fake()->text(200),
            'private' => false,
            'user_id' => User::factory(),
        ];
    }
}
