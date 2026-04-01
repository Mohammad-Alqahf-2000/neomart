<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subCategories = [
            /*1 */
            ['Mobile Phones ', 'الهواتف المحمولة', 1],
            /*2 */
            ['Laptops & Computers', 'أجهزة اللابتوب والكمبيوتر', 1],
            /*3 */
            ['Televisions & Video', 'التلفزيونات والفيديو', 1],
            /*4 */
            ['Computer Components ', 'مكونات الكمبيوتر', 1],
            /*5 */
            ['Small Appliances ', 'الأجهزة الصغيرة', 2],
            /*6 */
            ['Cookware ', 'أواني الطهي', 2],
            /*7 */
            ['Cutlery & Knives', 'أدوات المائدة والسكاكين', 2],
            /*8 */
            ['Coffee & Tea', 'القهوة والشاي', 2],
            /*9 */
            ['Furniture ', 'الأثاث', 3],
            /*10 */
            ['Bedding & Bath', 'أغطية الفراش ومنتجات الحمام', 3],
            /*11 */
            ['Home Decor', 'ديكور المنزل', 3],
            /*12 */
            ['Storage & Organization', 'التخزين والتنظيم', 3],
            /*13 */
            ['Men\'s Clothing ', 'ملابس رجالية', 4],
            /*14 */
            ['Women\'s Clothing', 'ملابس نسائية', 4],
            /*15 */
            ['Kids\' Clothing', 'ملابس الأطفال', 4],
            /*16 */
            ['Shoes', 'الأحذية', 4],
            /*17 */
            ['Underwear & Socks', 'الملابس الداخلية والجوارب', 4],
            /*18 */
            ['Accessories ', 'اكسسوارات', 4],
            /*19 */
            ['Exercise & Fitness', 'التمرين واللياقة البدنية', 5],
            /*20 */
            ['Team Sports', 'الرياضات الجماعية', 5],
            /*21 */
            ['Athletic Footwear', 'الأحذية الرياضية', 5],
            /*22 */
            ['Water Sports', 'الرياضات المائية', 5],
            /*23 */
            ['Outdoor Recreatio', 'الأنشطة الخارجية', 5],
            /*24 */
            ['Skincare', 'العناية بالبشرة', 6],
            /*25 */
            ['Hair Care ', 'العناية بالشعر', 6],
            /*26 */
            ['Makeup', 'مكياج', 6],
            /*27 */
            ['Fragrance ', 'عطور', 6],
            /*28 */
            ['Men\'s Grooming', 'منتجات الحلاقة والتجميل للرجال', 6],
            /*29 */
            ['Oral Care', 'العناية بالفم', 6],
            /*30 */
            ['Bath & Body', 'منتجات الاستحمام والعناية بالجسم', 6],
            /*31 */
            ['Gaming Consoles', 'أجهزة الألعاب', 1],
            /*32 */
            ['Food Storage', 'تخزين الطعام', 2],
            /*33 */
            ['Activewear', 'ملابس الرياضة', 4],
            /*34 */
            ['Hiking and Camping', 'المشي لمسافات طويلة والتخييم', 5],
            /*35 */
            ['Exercise & Fitness', 'التمرين واللياقة البدنية', 5],

        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::factory()->create([
                'en_name' => $subCategory[0],
                'ar_name' => $subCategory[1],
                'category_id' => $subCategory[2]
            ]);
        }
    }
}
