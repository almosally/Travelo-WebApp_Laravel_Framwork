<?php

use Faker\Generator as Faker;

$factory->define(App\Country::class, function (Faker $faker) {
    return [
        'country' => $faker->country,
        'image' => 'countryPic.jpg',
    ];
});
