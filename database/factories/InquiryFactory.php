<?php

use Faker\Generator as Faker;
use \App\Inquiry;

$factory->define(Inquiry::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'contents' => $faker->paragraph(),
    ];
});
