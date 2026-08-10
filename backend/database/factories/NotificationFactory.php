<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Product;
use App\Models\StoreOrderItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['system', 'promotion', 'order-update', 'payment-update']);
        return [
            'message' => fake()->text(),
            'type' => $type,
            'is_read' => fake()->boolean(),
            'user_id' => fake()->randomElement(User::select('id')->pluck('id')->toArray()),
            "product_id" => fake()->randomElement(Product::select('id')->pluck('id')->toArray()),
            "store_order_item_id" => fake()->randomElement(StoreOrderItem::select('id')->pluck('id')->toArray()),
        ];
    }
}
