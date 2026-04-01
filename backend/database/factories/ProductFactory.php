<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Store;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = fake()->randomElement([
            ['Samsung Galaxy S23 Ultra', 'سامسونج جالاكسي S23 الترا', 'A premium Android smartphone featuring a powerful 200MP camera, built-in S Pen for note-taking and navigation, and a long-lasting battery for all-day use. Perfect for productivity, creativity, and entertainment.', 'مدمج لتدوين الملاحظات والتنشيط وبطارية تدوم طويلاً للاستخدام طوال اليوم. مثالي للإنتاجية والإبداع والترفيه', 1, 2],
            ['Apple iPhone 14 Pro', ' آيفون 14 برو من Apple', 'Experience the revolutionary Dynamic Island and always-on display. The iPhone 14 Pro boasts a professional-grade 48MP camera system and is powered by the incredibly fast A16 Bionic chip for unmatched performance.', 'جرب Dynamic Island الثوري والشاشة الدائمة التشغيل. يفتخر iPhone 14 Pro بنظام كاميرا احترافي بدقة 48 ميجابكسل ويعمل بواسطة شريحة A16 Bionic السريعة بشكل لا يصدق لأداء لا مثيل له.', 1, 1],
            ['KitchenAid Artisan Stand Mixer', 'خلاط KitchenAid Artisan Stand', 'The iconic countertop mixer with a powerful motor and a wide range of attachments. It effortlessly handles tasks from kneading thick dough to whipping light cream, making it the heart of the kitchen.', 'الخلاط الأيقوني الذي يوضع على المنضدة بمحرك قوي ومجموعة واسعة من الملحقات. يتعامل بسهولة مع المهام من عجين العجن إلى خفق الكريمة الخفيفة، مما يجعله قلب المطبخ',5,9],
            [' Ninja Foodi Multi-Cooker', 'متعدد الطهي نينجا للطعام', 'An all-in-one kitchen powerhouse that pressure cooks, air fries, steams, bakes, and more. It combines multiple appliances into one, saving space and time while delivering crispy, delicious results.', 'جهاز متعدد الوظائف يجمع بين الطبخ بالضغط والقلي بالهواء والبخار والخبز والمزيد. يجمع بين عدة أجهزة في جهاز واحد، مما يوفر المساحة والوقت مع تقديم نتائج مقرمشة ولذيذة',5,33],
            ['Maytex Luxury Shower Curtain', 'ستارة حمام فاخرة من Maytex', 'A durable and water-resistant shower curtain made from high-quality polyester fabric. Features elegant designs and reinforced buttonholes for long-lasting use, instantly upgrading your bathroom decor.', 'ستارة دش متينة ومقاومة للماء مصنوعة من قماش البوليستر عالي الجودة. تتميز بتصاميم أنيقة وفتحات أزرار معززة للاستخدام طويل الأمد، مما يقوم على الفور ترقية ديكور الحمام الخاص بك',10,34],
            ['Nike Dri-FIT Legend Men\'s Training T-Shirt', 'كنزة تدريب للرجال الأساطير', ' Made with sweat-wicking Dri-FIT technology, this lightweight training tee keeps you dry and comfortable during your toughest workouts. Features a classic fit and feel for all-day wear.', ' مصنوع بتقنية Dri-FIT التي تطرد العرق، هذا القميص خفيف الوزن يبقيك جافًا ومرتاحًا خلال أصعب التدريبات. يتميز بتصميم كلاسيكي ومريح للارتداء طوال اليوم.',33,15],
            ['adidas Own The Run Women\'s Running Shoes', 'خذاء للركص للنساء', 'Engineered for comfort and stability on the run, these shoes feature a responsive Lightstrike midsole and a supportive adiwear outsole for durability. Perfect for daily runs and gym sessions.', 'مصممة للراحة والثبات أثناء الجري، هذه الأحذية تتميز بنعل Lightstrike متوسط يستجيب للحركة ونعل خارجي داعم من adiwear للمتانة. مثالية للجري اليومي وجلسات الصالة الرياضية.',33,16],
            ['Coleman Sundome Camping Tent', 'خيمة التخييم ', ' A reliable and easy-to-set-up dome tent for weekend campers. Features WeatherTec system with patented welded floors and inverted seams to help keep water out. Great ventilation for comfort.', ' خيمة قبة موثوقة وسهلة الإعداد لمخيمات نهاية الأسبوع. تتميز بنظام WeatherTec مع أرضيات ملحومة مسجلة ببراءة اختراع ودرزات مقلوبة للمساعدة في إبعاد الماء. تهوية رائعة للراحة.',34,35],
            ['Hydrating Facial Cleanser', 'مرطب ومنظف للوجه', 'A gentle, non-foaming cleanser that effectively removes dirt, oil, and makeup without disrupting the skin\'s natural protective barrier. Formulated with ceramides and hyaluronic acid to hydrate and restore.', 'منظف لطيف غير رغوي يزيل الأوساخ والزيوت والمكياج بفعالية دون عرقلة الحاجز الوقائي الطبيعي للبشرة. مُصمم بالسيراميد وحمض الهيالورونيك لترطيب البشرة واستعادتها',24,36],
            ['L\'Oréal Paris Revitalift Anti-Aging Day Cream', 'كريم اليوم مضاد للتجعيد ومنعش للبشرة من لوريال ', 'This daily moisturizer with SPF is enriched with Pro-Retinol and Vitamin C to help reduce wrinkles and firm skin. It protects against sun damage while providing intense hydration for a more youthful look.', ' هذا المرطب اليومي مع عامل الحماية من الشمس (SPF) غني بالبروريتينول وفيتامين سي للمساعدة في reducing التجاعيد وشد البشرة. يحمي من أضرار الشمس مع providing ترطيبًا مكثفًا لمظهر أكثر شبابًا.',24,24],
            ['Dell XPS 15 Laptop', 'لابتوب ديل اكس بي اس 15', 'A powerful creative powerhouse featuring a stunning OLED display, latest Intel Core processors, and dedicated NVIDIA graphics. Perfect for professionals, designers, and intense multitasking.', 'جهاز إبداعي قوي يتميز بشاشة OLED رائعة ومعالجات Intel Core حديثة وكرافيكس NVIDIA مخصص. مثالي للمحترفين والمصممين وتعدد المهام المكثف.',4,6],
            [' HP Pavilion Gaming Desktop', 'كمبيوتر ألعاب إتش بي بافيليون', 'Dive into the game with a desktop built for victory. Features an AMD Ryzen processor, NVIDIA GeForce GPU, and customizable RGB lighting for a immersive gaming experience.', ' اغوص في اللعبة مع جهاز كمبيوتر مصمم للانتصار. يتميز بمعالج AMD Ryzen وكرت شاشة NVIDIA GeForce وإضاءة RGB قابلة للتخصيص لتجربة لعب غامرة.',4,37],
            ['Tefal Non-Stick Frying Pan Set', 'مجموعة طناجر تيفال غير اللاصقة', ' Enjoy hassle-free cooking and easy cleaning with this durable non-stick set. The titanium coating ensures even heat distribution and exceptional longevity.', 'استمتع بالطهي بدون عناء والتنظيف السهل مع هذه المجموعة المتينة غير اللاصقة. الطلاء بالتيتانيوم يضمن توزيعًا متساويًا للحرارة ومتانة استثنائية',6,11],
            ['Pyrex Glass Mixing Bowl Set', 'مجموعة أوعية خلط بايركس الزجاجية', 'A set of durable glass bowls that are perfect for mixing, prepping, baking, and storing food. They are microwave, oven, and dishwasher safe for ultimate convenience.', 'مجموعة أوعية زجاجية متينة مثالية للخلط والتجهيز والخبز وتخزين الطعام. آمنة للاستخدام في الميكروويف والفرن وغسالة الصحون لتوفير أقصى درجات الراحة',6,38],
            ['IKEA STRANDMON Wing Chair','كرسي ايكيا ستراندمون ذو الذراعين','A classic wing chair that adds a timeless touch to any living room. Features a comfortable high back and comes in a variety of fabrics to match your decor.','كرسي كلاسيكي ذو ذراعين يضيف لمسة خالدة إلى أي غرفة معيشة. يتميز بظهر عالٍ مريح ويأتي بمجموعة متنوعة من الأقمشة لتتناسب مع ديكورك',11,29],
            ['Hugo Boss Men\'s Suit','بدلة رجالية من هوغو بوس','Crafted from premium Italian wool, this slim-fit suit offers a sharp, modern silhouette. Ideal for business meetings, formal events, and making a powerful impression.','مصنوعة من صوف إيطالي فاخر، تقدم هذه البدلة القصية ذات القصة النحيفة سلوًا حديثًا وحادًا. مثالية لاجتماعات العمل والفعاليات الرسمية وترك انطباع قوي',13,39],
            ['Bowflex SelectTech 552 Adjustable Dumbbells','دمبلز بوفليكس سليكت تيك 552 القابلة للتعديل','Replace an entire rack of dumbbells with one compact space-saving solution. Easily dial in your weight from 5 to 52.5 pounds for a full range of exercises.','استبدل رف دمبلز كامل بحل واحد مضغوط يوفر المساحة. اضبط الوزن بسهولة من 2.5 كجم إلى 24 كجم لمجموعة كاملة من التمارين',35,40],
            ['Olaplex No.3 Hair Perfector','أولابلكس رقم 3 مُحسّن الشعر','This at-home treatment repairs broken bonds and damage inside the hair shaft caused by chemical, thermal, and mechanical damage. Results in stronger, healthier, and shinier hair.','هذا العلاج المنزلي يصلح الروابط التالفة داخل جذع الشعر والتي تسببها الأضرار الكيميائية والحرارية والميكانيكية. النتيجة هي شعر أقوى وأكثر صحة ولمعانً',25,41],
            ['Gisou Honey Infused Hair Oil','زيت جيسو للشعر المُعبأ بالعسل','A luxurious hair oil formulated with Mirsalehi honey and natural ingredients to tame frizz, add brilliant shine, and nourish hair without weighing it down.','زيت شعر فاخر مُصَنّع من عسل Mirsalehi والمكونات الطبيعية لترويض التجعيد وإضافة لمعان رائع وتغذية الشعر دون أن يثقل عليه.',25,42],
        ]);
        return [
            "en_name" => $products[0],
            'ar_name' => $products[1],
            'en_description' => $products[2],
            'ar_description' => $products[3],
            'stock' => rand(0, 100),
            'price' => rand(1, 200),
            'type' => fake()->randomElement(['N', 'U']),
            'availability' => fake()->boolean(),
            'sub_category_id' => $products[4],
            'brand_id' => $products[5],
            'store_id' => Store::factory(),
        ];
    }
}
