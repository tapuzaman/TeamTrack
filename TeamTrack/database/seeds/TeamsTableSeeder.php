<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Team;
use App\User;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for($x=0; $x<5; $x++)
        {
            Team::createTeam($faker->company, User::all()->random()->id);
        }

    }
}
