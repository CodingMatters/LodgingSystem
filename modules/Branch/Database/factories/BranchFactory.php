<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use CodingMatters\Branch\Entities\Branch;
use Illuminate\Support\Str;

$factory->define(Branch::class, function (Faker $faker) {

    $name = $faker->company . " Main";

    return [
        "name" => $name,
        "slug" => Str::slug($name),
        "location" => $faker->address,
    ];
});
