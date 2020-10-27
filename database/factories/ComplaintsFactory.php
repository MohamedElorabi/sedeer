<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Complaints;
use Faker\Generator as Faker;

$factory->define(Complaints::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'phone' => $faker->word,
        'complaints' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
