<?php

use Illuminate\Database\Seeder;
use App\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //default need to run webside
        Config::create(['name' => 'price_per_day','value' => 10000]);
        Config::create(['name' => 'merchant_id','value' => 'xxxxx']);
        Config::create(['name' => 'api_user','value' => 'xxxxx']);
        Config::create(['name' => 'api_password','value' => 'xxxxx']);
    }
}
