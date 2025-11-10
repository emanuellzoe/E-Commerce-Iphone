<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EcommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('ecommerce')->insert([
                'product_name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->randomFloat(2, 1, 1000),
                'stock' => $faker->numberBetween(1, 100),
            ]);
        }
    }
}
