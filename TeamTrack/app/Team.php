<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    protected $guarded = [];


    // Functions

    public function createTeam($team_name, $leader_id)
    {
        $newTeam = createTeamDB($team_name, $leader_id); //creates Team in DB and assigns creator as Leader
        addMember(Auth::id(), $newTeam->id); //adds creator to created Team's member-list
        $newTeamBacklog = createBacklog($newTeamId); //create Backlog for created Team
        createSprints($newTeamBacklog->id); // create Sprints for created team
    }

    public static function addMember($member_id, $team_id)
    {
        $member = Member::find($member_id);
        $member->teams()->attach($team_id);
    }

    public static function addMemberByEmail($member_email, $team_id)
    {
        $member = Member::where('email',$member_email)->first();
        $member->teams()->attach($team_id);
    }


    // Internal Functions

    private function createTeamDB($team_name, $leader_id)
    {
        $newTeam = Team::create(['name' => $request->input('name'), 'leader_id'=>Auth::id() ]);
        return $newTeam;
    }

    private function createBacklog($newTeamId)
    {

    }


    // Eloquent Relationships 

    public function users(){
        return $this->belongsToMany('App\User','team_user','team_id');
    }

    public function members(){
        return $this->belongsToMany('App\Member','team_user','team_id','user_id');
    }

    public function leader()
    {
        return $this->belongsTo('App\Leader','leader_id');
    }

    public function backlog()
    {
        return $this->hasOne('App\Backlog');
    }

}
