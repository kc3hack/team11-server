<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->userName
    ];
});

$factory->define(\App\Models\Tatekan::class, function (Faker $faker) {
    return [
        'uri' => $faker->url
    ];
});

$factory->define(\App\Models\Score::class, function (Faker $faker) {
    return [
        'value' => $faker->randomFloat,
        'user_id' => 1
    ];
});
