<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $fileName = $faker->numberBetween($min = 1, $max = 10) . '.jpg';
    return [
        'path' => env('AWS_BUCKET') . "/img/products/{$fileName}"
    ];
});

$factory->state(Image::class, 'user', function (Faker $faker) {
    $fileName = $faker->numberBetween($min = 1, $max = 6) . '.jpg';
    return [
        'path' => env('AWS_BUCKET') . "/img/users/{$fileName}"
    ];
});


