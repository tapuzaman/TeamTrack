<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends User
{
    
    protected $table = 'users';

    public function teams()
    {
        return $this->belongsToMany('App\Team','team_user','user_id','team_id');
    }

}