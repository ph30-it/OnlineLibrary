<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "firstname" => "admin",
            "lastname" => "admin",
            "phone" => 2019,
            "roles" => 1,
            "email" => "admin@gmail.com",
            "password" => bcrypt("admin")
        ];
        User::create($data);
    }
}
