<?php

namespace App\Policies;

use App\User;
use App\Sprint;
use Illuminate\Auth\Access\HandlesAuthorization;

class SprintPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any sprints.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the sprint.
     *
     * @param  \App\User  $user
     * @param  \App\Sprint  $sprint
     * @return mixed
     */
    public function view(User $user, Sprint $sprint)
    {
        //
    }

    /**
     * Determine whether the user can create sprints.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the sprint.
     *
     * @param  \App\User  $user
     * @param  \App\Sprint  $sprint
     * @return mixed
     */
    public function update(User $user, Sprint $sprint)
    {
        //
    }

    /**
     * Determine whether the user can delete the sprint.
     *
     * @param  \App\User  $user
     * @param  \App\Sprint  $sprint
     * @return mixed
     */
    public function deleteSprint(User $user, Sprint $sprint)
    {
        return $user->id == $sprint->backlog->team->leader_id;
    }

    /**
     * Determine whether the user can restore the sprint.
     *
     * @param  \App\User  $user
     * @param  \App\Sprint  $sprint
     * @return mixed
     */
    public function restore(User $user, Sprint $sprint)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the sprint.
     *
     * @param  \App\User  $user
     * @param  \App\Sprint  $sprint
     * @return mixed
     */
    public function forceDelete(User $user, Sprint $sprint)
    {
        //
    }
}
