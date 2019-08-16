<?php

namespace App\Policies;

use App\User;
use App\Sprint;
use Illuminate\Auth\Access\HandlesAuthorization;

class SprintPolicy
{
    use HandlesAuthorization;

    public function deleteSprint(User $user, Sprint $sprint)
    {
        return $user->id == $sprint->backlog->team->leader_id;
    }

}
