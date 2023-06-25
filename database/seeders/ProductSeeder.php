<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('products')->truncate();
        Schema::enableForeignKeyConstraints();

        // خضروات
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                'name' => 'منتج الخضروات ' . $i,
                'sub_category_id' => 2,
                'category_id' => 1,
                'desc' => 'وصف المنتج الخضروات ' . $i,
                'image' => 'image1.jpg',
            ]);
        }

        // فاكهة
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                'name' => 'منتج الفاكهة ' . $i,
                'sub_category_id' =>  6,
                'category_id' => 2,
                'desc' => 'وصف المنتج الفاكهة ' . $i,
                'image' => 'image2.jpg',
            ]);
        }

        // بقالة
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                'name' => 'منتج البقالة ' . $i,
                'sub_category_id' => 8,
                'category_id' => 3,
                'desc' => 'وصف المنتج البقالة ' . $i,
                'image' => 'image3.jpg',
            ]);
        }

        // أعلاف
        for ($i = 1; $i <= 5; $i++) {
            DB::table('products')->insert([
                'name' => 'منتج الأعلاف ' . $i,
                'sub_category_id' => 10,
                'category_id' => 4,
                'desc' => 'وصف المنتج الأعلاف ' . $i,
                'image' => 'image4.jpg',
            ]);
        }


    }
}
