<?php

use Illuminate\Database\Seeder;

class PostSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Post', 100)->create();
    }
}
