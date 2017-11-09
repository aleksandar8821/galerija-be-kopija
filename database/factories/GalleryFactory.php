<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Gallery::class, function (Faker $faker) {
	return [
        'name' => $faker->sentences($nbWords = 2, $variableNbWords = true),
        'description' => $faker->text($maxNbChars = 200)
	];
});

