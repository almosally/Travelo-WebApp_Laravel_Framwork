<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'body' => $faker->realText(500),
        'user_id' => $faker->numberBetween(1, 5),
        'country_id' => $faker->numberBetween(1, 3),
        'cover_image' => 'noImage.jpg',

    ];
});
