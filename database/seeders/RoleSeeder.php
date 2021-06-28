<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'role' => "Super Admin",

            ],
            [
                'role' => "Admin",

            ],
            [
                'role' => "Sub Admin",

            ],

        ]);
        DB::table('users')->insert([
            [
                'name' => "Super Admin",
                'email' => "superadmin@gmail.com",
                'role_id' => 1,
                'password' => Hash::make(1234),

            ],
            [
                'name' => "Group Admin",
                'email' => "admin@gmail.com",
                'role_id' => 2,
                'password' => Hash::make(1234),

            ],
            [
                'name' => "Group Sub Admin",
                'email' => "subadmin@gmail.com",
                'role_id' => 3,
                'password' => Hash::make(1234),
            ],

        ]);


    }
}
