<?php

use Faker\Generator as Faker;
use App\Categories;

$factory->define(Categories::class, function (Faker $faker) {
    return [
        'name' => $faker->name
    ];
});
