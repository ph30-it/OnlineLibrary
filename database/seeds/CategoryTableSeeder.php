<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();
    	
        $numberOfCategory = 10;

        for($i = 0; $i < $numberOfCategory; $i++){
        	App\Category::create([
        		'name' => $faker->name
        	]);
        }
    }
}
