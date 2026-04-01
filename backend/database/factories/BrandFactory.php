<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brands = fake()->randomElement([
            ['Apple', 'أبل'],
            ['Samsung', 'سامسونج'],
            ['Sony', 'سوني'],
            ['Huawei', 'هواوي'],
            ['Xiaomi', 'شاومي'],
            ['Dell', 'ديل'],
            ['Lenovo', 'لينوفو'],
            ['Canon', 'كانون'],
            ['KitchenAid', 'كيتشن أيد'],
            ['Philips', 'فيليبس'],
            ['Tefal', 'تيفال'],
            ['Panasonic', 'باناسونيك'],
            ['Moulinex', 'مولينكس'],
            ['Kenwood', 'كينوود'],
            ['Nike', 'نايكي'],
            ['Adidas', 'أديداس'],
            ['Zara', 'زارا'],
            ['Gucci', 'غوتشي'],
            ['Louis Vuitton', 'لويس فويتون'],
            ['The North Face ', 'ذا نورث فيس'],
            ['Columbia', 'كولومبيا'],
            ['Decathlon', 'ديكاثلون'],
            ['Wilson', 'ويلسون'],
            ['L\'Oréal ', 'لوريال'],
            ['Nivea', 'نيفيا'],
            ['Dove', 'دوف'],
            ['Pantene', 'بانتين'],
            ['Olay', 'أولاي'],
            ['IKEA', 'إيكيا'],
            ['Home Centre', 'هوم سنتر'],
            ['Crate & Barrel', 'كرايت آند باريل'],
            ['Pottery Barn', 'بوتري بارن'],
        ]);

        return [
            'en_name' => $brands[0],
            'ar_name' => $brands[1]
        ];
    }
}
