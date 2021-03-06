<?php

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

$factory->define(App\Models\Admin::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('123123'), // secret
        'job_title' => 'Admin', 
        'remember_token' => str_random(10),
    ];
});
