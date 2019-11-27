<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class refferalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        foreach (range(1,5) as $index) {
 
            $check = new \App\Refferals();
            $check->patient_id = $faker->unique(true)->numberBetween(1, 50);
            $check->patient_name = $faker->userName;; 
            $check->department_to = $faker->word;
            $check->department_from = $faker->word;
            $check->save();
        }
    }
}
