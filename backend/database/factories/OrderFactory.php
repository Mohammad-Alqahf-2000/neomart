<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'note' => fake()->text(),
            'status' => fake()->randomElement(['P', 'PEN', 'C', 'D', 'R']),
            'total_amount' => rand(100, 10000),
            'user_id' => fake()->randomElement(User::select('id')->pluck('id')->toArray()),
        ];
    }
}
