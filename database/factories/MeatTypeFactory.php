<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MeatType;
use Faker\Generator as Faker;

$factory->define(MeatType::class, function (Faker $faker) {

    return [
        'images' => $faker->word,
        'age' => $faker->randomDigitNotNull,
        'slaughter_date' => $faker->word,
        'butcher_id' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
