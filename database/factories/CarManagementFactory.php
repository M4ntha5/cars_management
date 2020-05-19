<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarManagement;
use Faker\Generator as Faker;

$factory->define(CarManagement::class, function (Faker $faker) {
    return [
        'cars_id' => $faker->numberBetween(1,50),
        'segments_id' => $faker->numberBetween(1,50),
        'user_id' => $faker->numberBetween(1,50),
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
    ];
});
