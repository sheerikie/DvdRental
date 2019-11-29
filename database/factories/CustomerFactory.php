<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Customer;
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

$factory->define(Customer::class, function (Faker $faker) {
    return [
        '_token' => csrf_token(),
        'name' => $this->faker->name,
        'national_id' => '3222222',
        'phone' => $this->faker->phone,
        'address' => $this->faker->locale('en_GB'),
            
       

    ];
});
