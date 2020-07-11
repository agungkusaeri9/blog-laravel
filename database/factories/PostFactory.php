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
        'text' => $faker->sentence(100),
        'image' => 'images/posts/default.jpg',
        'is_active' => 1,
        'user_id' => User::inRandomOrder()->first()->id
    ];
});
