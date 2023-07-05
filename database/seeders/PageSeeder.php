<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('pages')->truncate();
        Schema::enableForeignKeyConstraints();
        Page::factory()->create(['name' => 'سياية الخصوصية']);
        Page::factory()->create(['name' => 'من نحن']);
        Page::factory()->create(['name' => 'معلومات التواصل']);
        Page::factory()->create(['name' => 'عروض']);
        Page::factory()->create(['name' => 'حمل التطبيق']);
    }
}
