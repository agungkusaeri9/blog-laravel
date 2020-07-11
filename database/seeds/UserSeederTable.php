<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('login.php'),
            'image' => 'default.png'
        ]);
        User::create([
            'name' => 'agung',
            'email' => 'agungkusaeri@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('login.php'),
            'image' => 'default.png'
        ]);
        User::create([
            'name' => 'acep',
            'email' => 'acepsutisna@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('login.php'),
            'image' => 'default.png'
        ]);
        User::create([
            'name' => 'deni',
            'email' => 'denimaripin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('login.php'),
            'image' => 'default.png'
        ]);
    }
}
