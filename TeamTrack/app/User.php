<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Team;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function addUserToTeam($user_id, $team_id){
        $user = User::find($user_id);
        $user->teams()->attach($team_id);
    }

    public static function addUserToTeamByEmail($user_email, $team_id){
        $user = User::where('email',$user_email)->first();
        $user->teams()->attach($team_id);
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }
}
