<?php

namespace App\Policies;

use App\User;
use App\Member;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;


    public function remove(User $user, Team $team)
    {
        return $user->id == $team->leader_id;
    }

}
