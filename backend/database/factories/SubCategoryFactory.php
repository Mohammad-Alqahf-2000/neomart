<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subCategories = fake()->randomElement([
            ['Mobile Phones ', 'الهواتف المحمولة', 1],
            ['Laptops & Computers', 'أجهزة اللابتوب والكمبيوتر', 1],
            ['Televisions & Video', 'التلفزيونات والفيديو', 1],
            ['Computer Components ', 'مكونات الكمبيوتر', 1],
            ['Small Appliances ', 'الأجهزة الصغيرة', 2],
            ['Cookware ', 'أواني الطهي', 2],
            ['Cutlery & Knives', 'أدوات المائدة والسكاكين', 2],
            ['Coffee & Tea', 'القهوة والشاي', 2],
            ['Furniture ', 'الأثاث', 3],
            ['Bedding & Bath', 'أغطية الفراش ومنتجات الحمام', 3],
            ['Home Decor', 'ديكور المنزل', 3],
            ['Storage & Organization', 'التخزين والتنظيم', 3],
            ['Men\'s Clothing ', 'ملابس رجالية', 4],
            ['Women\'s Clothing', 'ملابس نسائية', 4],
            ['Kids\' Clothing', 'ملابس الأطفال', 4],
            ['Shoes', 'الأحذية', 4],
            ['Underwear & Socks', 'الملابس الداخلية والجوارب', 4],
            ['Accessories ', 'اكسسوارات', 4],
            ['Exercise & Fitness', 'التمرين واللياقة البدنية', 5],
            ['Team Sports', 'الرياضات الجماعية', 5],
            ['Athletic Footwear', 'الأحذية الرياضية', 5],
            ['Water Sports', 'الرياضات المائية', 5],
            ['Outdoor Recreatio', 'الأنشطة الخارجية', 5],
            ['Skincare', 'العناية بالبشرة', 6],
            ['Hair Care ', 'العناية بالشعر', 6],
            ['Makeup', 'مكياج', 6],
            ['Fragrance ', 'عطور', 6],
            ['Men\'s Grooming', 'منتجات الحلاقة والتجميل للرجال', 6],
            ['Oral Care', 'العناية بالفم', 6],
            ['Bath & Body', 'منتجات الاستحمام والعناية بالجسم', 6],
            ['Gaming Consoles', 'أجهزة الألعاب', 1],
            ['Food Storage', 'تخزين الطعام', 2],

        ]);
        return [
            'en_name' => $subCategories[0],
            'ar_name' => $subCategories[1],
            'category_id' => $subCategories[2]
        ];
    }
}
