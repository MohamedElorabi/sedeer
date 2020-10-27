<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Intro;
use Faker\Generator as Faker;

$factory->define(Intro::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'description' => $faker->text,
        'image' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
