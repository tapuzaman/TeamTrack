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
        $newUsers = factory(App\User::class,3)->create();

        //create Setting entry for new users
        foreach( $newUsers as $newUser)
        {
            App\Setting::create([
                'user_id' => $newUser->id,
                'current_team_id' => 0
            ]);
        }

    }
}
