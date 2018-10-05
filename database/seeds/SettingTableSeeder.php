<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => "Laravel Blog",
            'address' => 'Dhaka-Bangladesh',
            'contact_email' => 'info@laravelblog.com',
            'contact_number' =>'+8801942368204'
        ]);
    }
}
