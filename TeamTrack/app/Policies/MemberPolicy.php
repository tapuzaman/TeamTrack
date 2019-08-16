<?php

namespace App\Policies;

use App\User;
use App\Member;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    public function addMember(User $user, Team $team)
    {
        return $user->id == $team->leader_id;
    }

    public function removeMember(User $user, Team $team)
    {
        return 1;
    }

}
