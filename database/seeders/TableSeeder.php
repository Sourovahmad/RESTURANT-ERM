<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
                'name' => 'table 1',
                'description' => 'description one',
                'table_url' => route('dashboard') . '/' . 'gotable' . '/' . 111,
                'active_status' => '2',
                'end_time' => null,
                'order_limit_time' => null,
            ],
            [
                'name' => 'table 2',
                'description' => 'description two',
                'table_url' => route('dashboard') . '/' . 'gotable' . '/' . 222,
                                'active_status' => '2',
                'end_time' => null,
                'order_limit_time' => null,
            ],
        ]);
    }
}
