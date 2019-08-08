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


    //Accessors

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


    //Mutators

    public function setCurrentTeamIdAttribute($value)
    {
        $this->setting->attributes['currentTeamId'] = $value;
    }


    //Eloquent relation

    public function setting()
    {
        return $this->hasOne('App\Setting');
    }

}
