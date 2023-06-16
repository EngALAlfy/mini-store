<?php

namespace Database\Seeders;

use App\Http\Helpers\Utils;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('role_user')->truncate();
        Schema::enableForeignKeyConstraints();

        $roles = Utils::getRoles();

        foreach ($roles as $role){
            Role::create(['name' => $role]);
        }
    }



}
