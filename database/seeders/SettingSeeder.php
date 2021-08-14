<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'website_name' => 'Royal Fook Long Amsterdam - 53',
            'phone' => '12345678',
            'email' => 'test@gmail.com',
            'address' => 'Amsterdam, Netherland',
            'kitchen_printer_id' => '1',
            'bill_printer_id' => '2',
        ]);
    }
}
