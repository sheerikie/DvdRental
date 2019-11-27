<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CheckInTableSeeder extends Seeder
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
 
            $check = new \App\CheckIn();
            $check->patient_name = $faker->userName;
            $check->patient_id = $faker->unique(true)->numberBetween(1, 50);
            $check->entry_time = $faker->date('H:i:s', rand(1,54000)); // 00:00:00 - 15:00:00;
            $check->exit_time = $faker->date('H:i:s', rand(1,54000)); // 00:00:00 - 15:00:00;
            $check->save();
        }
    }
}
