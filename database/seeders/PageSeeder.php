<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::factory()->create(['name' => 'privacy']);
        Page::factory()->create(['name' => 'about']);
        Page::factory()->create(['name' => 'contact']);
        Page::factory()->create(['name' => 'download-app']);
    }
}
