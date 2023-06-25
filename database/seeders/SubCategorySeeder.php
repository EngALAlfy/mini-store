<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sub_categories')->truncate();
        Schema::enableForeignKeyConstraints();

        // إضافة بيانات الفئات الفرعية
        $subCategories = [
            ["id" => 1 ,'name' => 'خضروات ورقية', 'category_id' => 1],
            ["id" => 2 ,'name' => 'خضروات جذرية', 'category_id' => 1],
            ["id" => 3 ,'name' => 'خضروات قشرية', 'category_id' => 1],
            ["id" => 4 ,'name' => 'خضروات بقولية', 'category_id' => 1],
            ["id" => 5 ,'name' => 'خضروات طبية', 'category_id' => 1],
            ["id" => 6 ,'name' => 'فواكه موسمية', 'category_id' => 2],
            ["id" => 7 ,'name' => 'فواكه استوائية', 'category_id' => 2],
            ["id" => 8 ,'name' => 'منتجات بقالة أساسية', 'category_id' => 3],
            ["id" => 9 ,'name' => 'مشروبات بقالة', 'category_id' => 3],
            ["id" => 10 ,'name' => 'أعلاف للقطط', 'category_id' => 4],
            ["id" => 11 ,'name' => 'أعلاف للكلاب', 'category_id' => 4],
            ["id" => 12 ,'name' => 'أعلاف للطيور', 'category_id' => 4],
            ["id" => 13 ,'name' => 'أعلاف للمواشي', 'category_id' => 4],
        ];

        DB::table('sub_categories')->insert($subCategories);
    }
}
