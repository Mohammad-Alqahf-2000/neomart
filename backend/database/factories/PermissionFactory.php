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
        $enAction = fake()->randomElement(["create", 'edit', 'delete', 'show' , 'list']);
        $arAction = fake()->randomElement(["إنشاء", 'تعديل', 'حذف', 'رؤية' , 'قائمة']);
        $enTable = fake()->randomElement(['users', 'stores', 'products', 'categories', 'sub-categories', '']);
        $arTable = fake()->randomElement(['مستخدمين', 'متاجر', 'بضائع', 'أنواع', 'أنواع جزئية', '']);
        return [
            'en_name' => $enAction . ' ' . $enTable . rand(1, 200),
            'en_name' => $arAction . ' ' . $arTable . rand(1, 200),
            'slug' => $enAction . '-' . $enTable . rand(1, 200),
        ];
    }
}
