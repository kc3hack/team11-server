<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Tatekan::class, function (Faker $faker) {
    return [
        'uri' => $faker->url
    ];
});

$factory->define(\App\Models\Score::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat,
        'username' => $faker->username,
        'user_type' => $faker->randomElement(['admin', 'student'])
    ];
});
