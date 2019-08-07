<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $guarded = [];

    public static function addMember($member_id, $team_id){
        $member = Member::find($member_id);
        $member->teams()->attach($team_id);
    }

    public static function addMemberByEmail($member_email, $team_id){
        $member = Member::where('email',$member_email)->first();
        $member->teams()->attach($team_id);
    }

    public function users(){
        return $this->belongsToMany('App\User','team_user','team_id');
    }

    public function members(){
        return $this->belongsToMany('App\Member','team_user','team_id','user_id');
    }

    public function leader()
    {
        return $this->belongsTo('App\Leader','id');
    }

    public function backlog()
    {
        return $this->hasOne('App\Backlog');
    }

}
