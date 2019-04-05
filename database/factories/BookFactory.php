<?php

use Faker\Generator as Faker;
use App\Book;

$factory->define(Book::class, function (Faker $faker) {
	return[
		'name' => $faker->word,
		'img' => 'https://images.penguinrandomhouse.com/cover/9780307806581',
		'author' => $faker->name,
		'published_year' => $faker->year($max = 'now'),
		'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'price' => $faker->numberBetween($min = 1000, $max = 1000000),
		'quantity' => $faker->numberBetween($min = 0, $max = 100),
		'categories_id' => 1
	];
});
