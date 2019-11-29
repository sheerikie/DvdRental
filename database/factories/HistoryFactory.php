<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\History;
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

$factory->define(History::class, function (Faker $faker) {
    return [
        
        'customer_id' =>$faker->unique(true)->numberBetween(1, 20),
        'dvd_id' => $faker->unique(true)->numberBetween(1, 20),
        'borrowing_date' => $faker->date('H:i:s', rand(1,54000)), // 00:00:00 - 15:00:00;, 
        'deadline_date' => $faker->date('H:i:s', rand(1,54000)), // 00:00:00 - 15:00:00;,
        'return_date' => $faker->date('H:i:s', rand(1,54000)), // 00:00:00 - 15:00:00;,
        'penalty' => '0', 
       

    ];
});
