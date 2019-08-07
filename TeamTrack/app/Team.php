<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public function users(){
        return $this->belongsToMany('App\User','team_user','team_id');
    }

    public function members(){
        return $this->belongsToMany('App\Member','team_user','team_id','user_id');
    }

}
