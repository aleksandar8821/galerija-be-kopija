<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Image::class, function (Faker $faker) {
    return [
       'url' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
