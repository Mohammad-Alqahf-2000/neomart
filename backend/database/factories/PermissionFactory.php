<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $action = fake()->randomElement(["create", 'edit', 'delete', 'show']);
        $table = fake()->randomElement(['users', 'stores', 'products', 'categories', 'sub-categories', '']);/*  */
        return [
            'name' => $action . '-' . $table . rand(1, 200),
            'description' => fake()->text()
        ];
    }
}
