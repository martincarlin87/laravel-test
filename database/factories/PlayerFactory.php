<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'height' => $faker->numberBetween(60, 96), // between 5ft and 8ft
        'weight' => $faker->numberBetween(100, 300),
        'position_id' => $faker->numberBetween(1, count(Position::POSITIONS)),
        'team_id' => $faker->numberBetween(1, count(Team::TEAMS)),
    ];
});
