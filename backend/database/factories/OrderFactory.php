<?php

namespace Database\Factories;

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\StoreOrder;

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
            'status' => fake()->randomElement(OrderStatusEnum::cases()),
            'total_amount' => rand(100, 10000),
            'paid_at' => fake()->dateTimeBetween('-4 monthe', 'now'),
            'payment_status' => fake()->randomElement(PaymentStatusEnum::cases()),
            'user_id' => fake()->randomElement(User::select('id')->pluck('id')->toArray()),
        ];
    }
}
