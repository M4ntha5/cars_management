<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Statuses;
use Faker\Generator as Faker;

$factory->define(Statuses::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'parent_id' => $faker->randomNumber()
    ];
});
