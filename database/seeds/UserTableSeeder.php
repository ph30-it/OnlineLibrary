<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	
        $numberOfUsers = 10;

        for($i = 0; $i < $numberOfUsers; $i++){
        	App\User::create([
        		'email' => $faker->unique()->safeEmail,
        		'phone' => $faker->phoneNumber,
        		'gender' => 1,
        		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        		'address' => $faker->address,
        		'firstname' => $faker->firstNameMale,
        		'lastname' => $faker->lastName,
        		'roles' => 0,
        		'email_verified_at' => now(),
        		'remember_token' => Str::random(10)
        	]);
        }
    }
}
