<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Game;
use App\Models\Team;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Game::class, function (Faker $faker) {
    return [
        'tip_off' => $faker->dateTimeBetween('-1 year', '+90 days'),
        'home_team_id' => $faker->randomElement(array_keys(Team::TEAMS)),
        'away_team_id' => $faker->randomElement(array_keys(Team::TEAMS)),
        'home_team_points' => $faker->numberBetween(1, 130),
        'away_team_points' => $faker->numberBetween(1, 130),
    ];
});
