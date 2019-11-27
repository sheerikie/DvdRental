<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Treatment;
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

$factory->define(Treatment::class, function (Faker $faker) {
    return [
        'patient_name' => $faker->userName,
        'patient_id' => $faker->unique(true)->numberBetween(1, 50),
        'disease' => $faker->word, 
        'symptoms' => $faker->text,
        'seen' => $faker->boolean(),
        'doctor' => $faker->userName,
        'department' => $faker->word,
        'treatment' =>$faker->text

    ];
});
