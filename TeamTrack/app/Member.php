<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends User
{
    
    protected $table = 'users';


    // Functions

    public static function teamList($member_id) 
    {   
        // TODO does it need to take param ? Fetch it from Auth ?
        $member = Member::find($member_id);
        return $member->teams;
    }

    // Eloquent Relationships 

    public function teams()
    {
        return $this->belongsToMany('App\Team','team_user','user_id','team_id');
    }

    

}
