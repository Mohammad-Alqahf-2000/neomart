<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $categories = fake()->randomElement([
            ['Electronic', 'الكترونيات', 'Devices and equipment that operate using circuits, transistors, and software, including smartphones, laptops, televisions, cameras, and home appliances.', 'أجهزة ومعدات تعمل باستخدام الدوائر الكهربائية والترانزستورات والبرمجيات، بما في ذلك الهواتف الذكية وأجهزة الكمبيوتر المحمولة والتلفزيونات والكاميرات والأجهزة المنزلية'],
            ['Kitchen', 'المطبخ', 'Appliances, tools, utensils, and accessories used for food preparation, cooking, baking, storage, and serving.', 'الأجهزة والأدوات والأواني والملحقات المستخدمة في تحضير الطعام والطبخ والخبز والتخزين والتقديم'],
            ['Home Goods', 'السلع المنزلية', 'A broad range of items used to furnish, decorate, clean, and organize a living space, including furniture, bedding, decor, and storage solutions.', 'مجموعة واسعة من العناصر المستخدمة لتأثيث وتزيين وتنظيف وتنظيم مساحة المعيشة، بما في ذلك الأثاث وأغطية الفراش والديكور وحلول التخزين'],
            ['Apparel', 'الملابس', 'Items of clothing and wearables for men, women, and children, including shirts, pants, dresses, outerwear, and undergarments.', 'قطع من الملابس والملبوسات للرجال والنساء والأطفال، بما في ذلك القمصان والبناطيل والفساتين والملابس الخارجية والملابس الداخلية'],
            ['Sports and Outdoors', 'الرياضة والهواء الطلق', 'Equipment, apparel, and gear designed for athletic activities, fitness, camping, hiking, and other outdoor adventures.', 'المعدات والملابس والمعدات المصممة للأنشطة الرياضية واللياقة البدنية والتخييم والمشي لمسافات طويلة ومغامرات خارجية أخرى'],
            ['Beauty and Personal Care', 'الجمال والعناية الشخصية', 'Products used for hygiene, grooming, and enhancing one\'s appearance, including skincare, haircare, makeup, fragrance, and oral care.', 'المنتجات المستخدمة للنظافة الشخصية والتجميل وتحسين المظهر، بما في ذلك العناية بالبشرة والعناية بالشعر ومستحضرات التجميل والعطور والعناية بالفم'],
        ]);
        return [
            'en_name' => $categories[0],
            'ar_name' => $categories[1],
            'en_description' => $categories[2],
            'ar_description' => $categories[3],
        ];
    }
}
