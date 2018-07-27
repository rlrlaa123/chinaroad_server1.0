<?php

use Faker\Generator as Faker;
use \App\FAQ;

$factory->define(FAQ::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'contents' => $faker->paragraph(),
    ];
});
