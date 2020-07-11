<?php

use Illuminate\Database\Seeder;

class TagSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Tag', 20)->create();
    }
}
