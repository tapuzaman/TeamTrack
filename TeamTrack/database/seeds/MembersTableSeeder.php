<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Team;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x=0; $x<50; $x++)
        {
            Team::addMember(User::all()->random()->id, Team::all()->random()->id);
        }
    }
}
