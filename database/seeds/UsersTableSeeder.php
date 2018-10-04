<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin1642',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
