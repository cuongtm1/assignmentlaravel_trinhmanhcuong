<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'date_of_birth' => $faker->date(),
        'phone' => '0123456789',
        // 'role' => $faker->numberBetween($min = 0, $max = 1),
        'is_active' => $faker->numberBetween($min = 0, $max = 1),
        'password' => bcrypt(123456),
    ];
});