<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	$numberOfrecords = 100;

        for($i = 0; $i < $numberOfrecords; $i++){
        	App\Book::create([
        		'name' => $faker->word,
        		'img' => $faker->imageUrl($width = 640, $height = 480),
        		'author' => $faker->name,
        		'published_year' => $faker->year($max = 'now'),
        		'describes' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        		'price' => $faker->numberBetween($min = 1000, $max = 1000000),
        		'quantity' => $faker->numberBetween($min = 0, $max = 100),
        		'categories_id' => $faker->numberBetween($min = 1, $max = 10)
        	]);
        }

    }
}
