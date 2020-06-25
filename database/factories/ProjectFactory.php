<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Client;
use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title'       => $faker->word(),
        'client_id'   => Client::inRandomOrder()->first()->id,
        'description' => $faker->paragraph,
    ];
});
