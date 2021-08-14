<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrintersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('printers')->insert([

            [
                'name' => 'EPSON L380 Series',
                'description' => 'Printer for kithcen',
            ],

            [
                'name' => 'EPSON L130 Series',
                'description' => 'Printer For Bill',
            ],

        ]);
    }
}
