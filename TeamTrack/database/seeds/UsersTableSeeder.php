<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create new Users
        $newUsers = factory(App\User::class,20)->create();

        //create Setting entry for new Users
        foreach( App\User::all() as $user)
        {
            App\Setting::create([
                'user_id' => $newUser->id,
                'current_team_id' => 0
            ]);
        }

    }
}
