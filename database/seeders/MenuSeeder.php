<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([

            [
                'name' => 'menu 1',
                'price' => '10'
            ],

            [
                'name' => 'menu 2',
                'price' => '10'
            ],

            [
                'name' => 'menu 3',
                'price' => '10'
            ],
        ]);
    }
}
