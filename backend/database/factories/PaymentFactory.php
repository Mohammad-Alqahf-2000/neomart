<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => rand(-2000, 2000),
            'method' => fake()->randomElement(['Visa', 'MTN Cash', 'Syriatel Cash']),
            'status' => fake()->randomElement(['PEN', 'P', 'C', 'R', '']),
            'type' => fake()->randomElement(['R', 'P']),
            'transaction_id' => rand(1, 1000000),
            'order_id' => fake()->randomElement(Order::select('id')->pluck('id')->toArray())
        ];
    }
}
