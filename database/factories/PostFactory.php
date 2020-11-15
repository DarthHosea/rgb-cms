<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
        // Relate 'user_id' field with the class user
        'user_id' => factory(User::class),
        'title' => $faker->sentence,
        'image' => $faker->imageUrl('900', '300'),
        'body' => $faker->paragraph
    ];
});
