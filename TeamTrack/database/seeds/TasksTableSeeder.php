<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Sprint;
use App\Task;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        foreach( Sprint::all() as $sprint)
        {
            Task::createTask(
                $sprint->id, $sprint->backlog->team->members->random() , 
                $sprint->backlog->team->members->random(), 
                $faker->realText($maxNbChars = 15, $indexSize = 1), 
                $faker->realText($maxNbChars = 40, $indexSize = 3)
            );

            //Task::createTask($sprint_id, $assigned_to, $created_by, $title, $description);
        }

    }
}
