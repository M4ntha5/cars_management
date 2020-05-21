<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'number' => Str::random(10),
        'year_made' => $faker->date,
        'model' => Str::random(20),
    ];
});
