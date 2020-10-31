<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'date_from' => $faker->date,
        'date_to' => $faker->date,
        'active' => $faker->boolean(true),
        'title' => $faker->text(30),
        'subtitle' => $faker->text(50)
    ];
});
