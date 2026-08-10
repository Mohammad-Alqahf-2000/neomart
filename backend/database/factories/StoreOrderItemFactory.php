<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\StoreOrder;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreOrderItem>
 */
class StoreOrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "store_order_id" => fake()->randomElement(StoreOrder::select('id')->pluck('id')->toArray()),
            'product_id' => fake()->randomElement(Product::select('id')->pluck('id')->toArray()),
            "product_name" => fake()->randomElement(Product::select('en_name')->pluck('en_name')->toArray()),
            'product_price' => rand(10, 200),
            'quantity' => rand(1, 20),

        ];
    }
}
