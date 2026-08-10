<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\StoreOrderItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rating' => fake()->randomFloat(1, 0, 5),
            'comment' => fake()->realText(),
            'user_id' => fake()->randomElement(User::select('id')->pluck('id')->toArray()),
            'store_order_item_id' => fake()->randomElement(StoreOrderItem::select('id')->pluck('id')->toArray()),
        ];
    }
}
