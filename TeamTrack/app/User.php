<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Team;

class User extends Authenticatable
{
    use Notifiable;

    public $currentTeamId=0;

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

    // TODO: Clean cuurent team code.. Refactor some other class
    public function currentTeam(){
        //add condition to fetch data from DB if 0
        if($this->currentTeamId==0){
            return 'Teams';
        }
        else{
            return Team::find($this->currentTeamId)->name;
        }
    }

    public function currentTeamId(){
        return $this->currentTeamId;
    }

    public function setCurrentTeamId($newCurrentTeamId){
        $this->currentTeamId = $newCurrentTeamId;
        return $newCurrentTeamId;
    }

    // public function teams()
    // {
    //     return $this->belongsToMany('App\Team','team_user','user_id');
    // }
}
