<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\product;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Brand::create([
            'name' => 'OPPO',
            'user_id' => Auth::id(),
        ]);
        Category::create([
            'name' => 'mobile',
            'user_id' => Auth::id(),
        ]);
        Vendor::create([
            'name' => 'tager',
            'nick_name' => 'tager nick',
            'address' => '1 st Giza',
            'mobile_number' => 01112564751,
            'user_id' => Auth::id(),
        ]);

        foreach (range(1,7000) as $index) {
            product::insert([
                'name' => $faker->username,
                'quantity' => rand(1,3),
                'buying_price' => rand(2,4),
                'selling_price' => rand(2,5),
                'code' => rand(5,10),
                'brand_id' => 1,
                'category_id' => 1,
                'vendor_id' => 1,
                'user_id' => Auth::id(),
                'images' => serialize($faker->username),
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }
    }
}
