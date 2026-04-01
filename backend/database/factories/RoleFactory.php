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
        $slug = '';
        switch ($enName) {
            case 'Admin': {
                    $arName = "مدير";
                    $slug='admin';
                    break;
                }
            case 'Client': {
                    $arName = "زبون";
                    $slug='client';
                    break;
                }
            case 'Seller': {
                    $arName = "بائع";
                    $slug='seller';
                    break;
                }
            case 'Buyer': {
                    $arName = "مشتري";
                    $slug='buyer';
                    break;
                }
            case 'Assistant': {
                    $arName = "مساعد";
                    $slug='assistant';
                    break;
                }
        }
        return [
            'en_name' => $enName,
            'ar_name' => $arName,
            'slug' => $slug
        ];
    }
}
