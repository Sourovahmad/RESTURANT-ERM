<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'category One (Default)',
                'description' => 'category One Description',
            ],
            [
                'name' => 'category Two',
                'description' => 'category Two Description',
            ],
            [
                'name' => 'category Three',
                'description' => 'category Three Description',
            ],
            ]);
    }
}
