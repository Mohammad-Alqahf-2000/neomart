<?php

namespace Database\Factories;

use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\StoreOrder;

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
            'status' => fake()->randomElement(PaymentStatusEnum::cases()),
            'transaction_id' => rand(1, 1000000),
            'store_order_id' => fake()->randomElement(StoreOrder::select('id')->pluck('id')->toArray()),
            'paid_at' => fake()->dateTimeBetween('-4 month', 'now'),

        ];
    }
}
