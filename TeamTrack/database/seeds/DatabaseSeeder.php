<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);   // creates Users
        $this->call(TeamsTableSeeder::class);   // creates Teams
        $this->call(MembersTableSeeder::class); // adds Members to Teams
        //$this->call(TasksTableSeeder::class);   //creates Tasks
    }
}
