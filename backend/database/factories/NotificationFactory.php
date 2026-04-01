<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        ];
    }
}
