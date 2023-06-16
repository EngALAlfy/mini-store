<?php

namespace Database\Seeders;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('settings')->truncate();
        Schema::enableForeignKeyConstraints();

        $settings = [
            [
                'key' => 'fixed_navbar',
                'value' => 'true',
            ],
            [
                'key' => 'collaps_sidebar',
                'value' => 'false',
            ],
            [
                'key' => 'install_date',
                'value' => Crypt::encrypt(Carbon::today()),
            ],
        ];

        foreach ($settings as $setting) {
            Setting::factory()->create($setting);
        }
    }
}
