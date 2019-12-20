<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use CodingMatters\User\Entities\User;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'api_token' => Str::random(16),
    ];
});
