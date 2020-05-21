<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CarStatus;
use Faker\Generator as Faker;

$factory->define(CarStatus::class, function (Faker $faker) {
    return [
        'date_from' => $faker->date(),
        'date_to' => $faker->date(),
        'car_id' => $faker->numberBetween(1,1000),
        'status_id' => $faker->numberBetween(1,1000),
    ];
});
