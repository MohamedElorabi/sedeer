<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Butchers;
use Faker\Generator as Faker;

$factory->define(Butchers::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'phone' => $faker->word,
        'image' => $faker->word,
        'address' => $faker->word,
        'longitude' => $faker->word,
        'latituede' => $faker->word,
        'views' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
