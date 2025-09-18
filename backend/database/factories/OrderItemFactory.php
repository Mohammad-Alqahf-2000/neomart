<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "order_id" => fake()->randomElement(Order::select('id')->pluck('id')->toArray()),
            'product_id' => fake()->randomElement(Product::select('id')->pluck('id')->toArray()),
            'countity' => rand(1, 20),
            'price' => rand(10, 200),
        ];
    }
}
