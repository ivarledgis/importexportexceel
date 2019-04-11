<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,        
        'roll_no' => $faker->unique()->numberBetween(1,50),
        'class' => $faker->numberBetween(1,10),
    ];
});
