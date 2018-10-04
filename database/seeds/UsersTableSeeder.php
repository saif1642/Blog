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
       $user = App\User::create([
            'name' => 'admin1642',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'admin'=>1
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/noimage.png',
            'about' => 'Magni beatae dicta, ab quasi mollitia quas maxime. In, libero sequi.',
            'facebook' =>'facebook.com',
            'youtube' =>'youtube.com'
        ]);
    }
}
