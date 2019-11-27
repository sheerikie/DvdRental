<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class treatmentsTableSeeder extends Seeder
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
 
            $check = new \App\Treatment();
            $check->patient_name = $faker->userName;
            $check->patient_id = $faker->unique(true)->numberBetween(1, 50);
            $check->disease = $faker->word; 
            $check->symptoms = $faker->text;
            $check->seen = $faker->boolean();;
            $check->doctor = $faker->userName;;
            $check->department = $faker->word;
            $check->treatment = $faker->text;
            $check->save();
        }
    }
}
