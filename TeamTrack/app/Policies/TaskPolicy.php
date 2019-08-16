<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    public function updateTask(User $user, Task $task)
    {
        return $user->id==$task->created_by;
    }


    public function deleteTask(User $user, Task $task)
    {
        return $user->id==$task->created_by;
    }

}
