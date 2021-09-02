<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_products')->insert([
            [
                'name' => 'service one'
            ],
            [
                'name' => 'service two'
            ],
            [
                'name' => 'service three'
            ],
            [
                'name' => 'service four'
            ],
            [
                'name' => 'service five'
            ],
        ]);
    }
}
