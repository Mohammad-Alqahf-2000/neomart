<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enName = fake()->randomElement(['Admin', 'Client', 'Seller', 'Buyer', 'Assistant']);
        $arName = '';
        switch ($enName) {
            case 'Admin': {
                    $arName = "مدير";
                    break;
                }
            case 'Client': {
                    $arName = "زبون";
                    break;
                }
            case 'Seller': {
                    $arName = "بائع";
                    break;
                }
            case 'Buyer': {
                    $arName = "مشتري";
                    break;
                }
            case 'Assistant': {
                    $arName = "مساعد";
                    break;
                }
        }
        return [
            'en_name' => $enName,
            'ar_name' => $arName,
            'description' => fake()->text(200)
        ];
    }
}
