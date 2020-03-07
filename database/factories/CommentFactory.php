<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Comment,Post,User};
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' =>Post::inRandomOrder()->first()->id,
        'user_id' =>User::inRandomOrder()->first()->id,
        'content' => $faker->paragraph(5),
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
    ];
});
