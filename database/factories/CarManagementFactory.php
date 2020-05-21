<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarManagement;
use Faker\Generator as Faker;

$factory->define(CarManagement::class, function (Faker $faker) {
    return [
        'car_id' => $faker->numberBetween(1,1000),
        'segment_id' => $faker->numberBetween(1,1000),
        'user_id' => $faker->numberBetween(1,1000),
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
    ];
});
