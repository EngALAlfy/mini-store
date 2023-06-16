<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();
        // admin user
        User::factory()->create(['email' => 'admin','name' => 'المدير']);
        // demo user
        User::factory()->create(['email' => 'demo','name' => 'حساب تجريبي']);
    }
}
