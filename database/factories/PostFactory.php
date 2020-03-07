<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Post,User,Category};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'content' => $faker->paragraph(5),
        'image' => $faker->imageUrl($width = 223, $height = 149 ,'cats'),
        'user_id' =>User::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
    ];
});
