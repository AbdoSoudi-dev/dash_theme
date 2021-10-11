<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Client;

class clientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30 ; $i++ ){
            client::create([
                'name' => $faker->name,
                'email' => 'email'.($i+1).'@email.com',
                "mobile_number" => 011 . rand(4,8),
                "user_id" => 1,
                "client_code" =>   Str::random(10),
            ]);
//            Client::create([
//                'name' => "sdad",
//                'email' => 'email@email.com',
//                "mobile_number" => 0112656563,
//                "user_id" => 1,
//                "address" => "Adadsada - asd -46dsaed",
//                "client_code" =>   5612,
//            ]);
        }
    }
}
