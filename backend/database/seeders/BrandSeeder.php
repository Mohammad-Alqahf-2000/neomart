<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            /* 1 */
            ['Apple', 'أبل'],
            /* 2 */
            ['Samsung', 'سامسونج'],
            /* 3 */
            ['Sony', 'سوني'],
            /* 4 */
            ['Huawei', 'هواوي'],
            /* 5 */
            ['Xiaomi', 'شاومي'],
            /* 6 */
            ['Dell', 'ديل'],
            /* 7 */
            ['Lenovo', 'لينوفو'],
            /* 8 */
            ['Canon', 'كانون'],
            /* 9 */
            ['KitchenAid', 'كيتشن أيد'],
            /* 10 */
            ['Philips', 'فيليبس'],
            /* 11 */
            ['Tefal', 'تيفال'],
            /* 12 */
            ['Panasonic', 'باناسونيك'],
            /* 13 */
            ['Moulinex', 'مولينكس'],
            /* 14 */
            ['Kenwood', 'كينوود'],
            /* 15 */
            ['Nike', 'نايكي'],
            /* 16 */
            ['Adidas', 'أديداس'],
            /* 17 */
            ['Zara', 'زارا'],
            /* 18 */
            ['Gucci', 'غوتشي'],
            /* 19 */
            ['Louis Vuitton', 'لويس فويتون'],
            /* 20 */
            ['The North Face ', 'ذا نورث فيس'],
            /* 21 */
            ['Columbia', 'كولومبيا'],
            /* 22 */
            ['Decathlon', 'ديكاثلون'],
            /* 23 */
            ['Wilson', 'ويلسون'],
            /* 24 */
            ['L\'Oréal ', 'لوريال'],
            /* 25 */
            ['Nivea', 'نيفيا'],
            /* 26 */
            ['Dove', 'دوف'],
            /* 27 */
            ['Pantene', 'بانتين'],
            /* 28 */
            ['Olay', 'أولاي'],
            /* 29 */
            ['IKEA', 'إيكيا'],
            /* 30 */
            ['Home Centre', 'هوم سنتر'],
            /* 31*/
            ['Crate & Barrel', 'كرايت آند باريل'],
            /* 32 */
            ['Pottery Barn', 'بوتري بارن'],
            /* 33 */
            ['Ninja', 'نينجا'],
            /* 34 */
            ['Maytex', 'مياتيكس'],
            /* 35 */
            ['Coleman', 'كوليمان'],
            /* 36 */
            ['CeraVe', 'كيرافي'],
            /* 37 */
            ['CeraVe', 'كيرافي'],
            /* 38 */
            ['Pyrex ', 'بايركس'],
            /* 39 */
            ['Hugo Boss', 'هوغو بوس'],
            /* 40 */
            ['Bowflex ', 'بوفليكس'],
            /* 41 */
            ['Olaplex  ', 'أولابلكس'],
            /* 42 */
            ['Gisou', 'جيسو'],
        ];

        foreach ($brands as $brand) {
            Brand::factory()->create([
                'en_name' => $brand[0],
                'ar_name' => $brand[1]
            ]);
        }
    }
}
