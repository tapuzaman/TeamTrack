<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Team;
use App\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {

    Team::createTeam($faker->company, User::all()->random()->id);

    // return [ 
    //     'name' => $faker->company,
    //     'leader_id' => User::all()->random()->id,
    // ];
});
