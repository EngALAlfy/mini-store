<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();
        Schema::enableForeignKeyConstraints();

        $categories = [
            ["id" => 1 ,'name' => 'خضروات', 'image' => 'vegetables.jpg', 'color' => 'green', 'desc' => 'استكشف تشكيلتنا الواسعة من الخضروات الطازجة والمغذية. احصل على الفوائد الصحية والنكهة الرائعة للخضروات المحلية والمستوردة. نقدم مجموعة متنوعة من الخضروات الورقية والجذرية والقشرية والبقولية والطبية. اختر الأفضل لطاولتك واستمتع بوجبات صحية ولذيذة.'],
            ["id" => 2 ,'name' => 'فاكهة', 'image' => 'fruits.jpg', 'color' => 'red', 'desc' => 'استمتع بتشكيلتنا المتنوعة من الفواكه الطازجة والموسمية. اكتشف النكهات الحلوة واللذيذة للفواكه المحلية والاستوائية. اختر بين البرتقال والموز والتفاح والفراولة والعنب والبطيخ وغيرها الكثير. تمتع بفوائد الفواكه الغنية بالفيتامينات والألياف لنمط حياة صحي ومتوازن.'],
            ["id" => 3 ,'name' => 'بقالة', 'image' => 'grocery.jpg', 'color' => 'blue', 'desc' => 'استكمل قائمة مشترياتك اليومية من قسم البقالة. نقدم لك مجموعة واسعة من المنتجات الأساسية مثل الأرز والزيوت والسكر والعصائر والحليب والمعلبات والمكرونة والتوابل. احصل على منتجات عالية الجودة والطعم الرائع لتلبية احتياجاتك اليومية بسهولة وراحة.'],
            ["id" => 4 ,'name' => 'أعلاف', 'image' => 'animal-feed.jpg', 'color' => 'yellow', 'desc' => 'نحن نهتم بصحة وتغذية حيواناتك الأليفة وماشيتك. اكتشف تشكيلتنا من الأعلاف الصحية والمتوازنة للقطط والكلاب والطيور والمواشي. نقدم منتجات عالية الجودة تضمن تلبية احتياجاتهم الغذائية والحفاظ على صحتهم ونشاطهم.'],
        ];

        DB::table('categories')->insert($categories);
    }
}
