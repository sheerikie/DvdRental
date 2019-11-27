<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\CheckIn;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(CheckIn::class, function (Faker $faker) {
    return [
       
        'patient_name' => $faker->userName,
        'patient_id' => $faker->unique(true)->numberBetween(1, 50),
        'entry_time' => $faker->date('H:i:s', rand(1,54000)), // 00:00:00 - 15:00:00;
        'exit_time'=> $faker->date('H:i:s', rand(1,54000)) // 00:00:00 - 15:00:00;

    ];
});
