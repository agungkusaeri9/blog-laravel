<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(10);
    return [
        'category_id' => Category::inRandomOrder()->first()->id,
        'title' => $title,
        'slug' => \Str::slug($title),
        'text' => $faker->sentence(400),
        'image' => 'images/posts/BeLFGXvlWqRBLk6BTPeeh0qQAnzX0U0S2LDFOO32.jpeg',
        'is_active' => 1,
        'user_id' => User::inRandomOrder()->first()->id
    ];
});
