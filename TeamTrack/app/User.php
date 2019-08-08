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
    public $flag;

    //public function __construct() {}


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'currentTeamId'
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

    public static function addUserToTeam($user_id, $team_id)
    {
        $user = User::find($user_id);
        $user->teams()->attach($team_id);
    }

    public static function addUserToTeamByEmail($user_email, $team_id)
    {
        $user = User::where('email',$user_email)->first();
        $user->teams()->attach($team_id);
    }

    // TODO: Clean cuurent team code.. Refactor some other class
    public function currentTeam()
    {
        // condition to fetch data from DB if 0
        if($this->currentTeamId==0){
            return 'Teams';
        }
        else{
            return Team::find($this->currentTeamId)->name;
        }
    }

    public function currentTeamId()
    {
        return $this->currentTeamId;
    }

    public function setCurrentTeamId($newCurrentTeamId)
    {
        $this->currentTeamId = $newCurrentTeamId;
        return $newCurrentTeamId;
    }


    //accessors

    public function getFlagAttribute()
    {
        return $this->flag;
    }

    public function getCidAttribute($value)
    {
        return ucfirst($value);
    }

    public function getCurrentTeamIdAttribute()
    {
        return $this->setting->currentTeamId;
    }

    public function getCurrentTeamNameAttribute()
    {
        if($this->currentTeamId==0){
            return 'Select Team';
        }
        else{
            return Team::find($this->currentTeamId)->name;
        }
    }


    //mutators

    public function setCurrentTeamIdAttribute($value)
    {
       // $this->currentTeamId = $value;
        $this->setting->attributes['currentTeamId'] = $value;
        //$this->setting->currentTeamId = $value;
       // $this->attributes['currentTeamId'] = $value;
    }

    public  function setFlagAttribute($value)
    {
       $this->flag = $value;
    }

    public function setCidAttribute($value)
    {
        $this->attributes['cid'] = $value;
    }


    //Eloquent relation

    public function setting()
    {
        return $this->hasOne('App\Setting');
    }

}
