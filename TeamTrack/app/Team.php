<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    protected $guarded = [];


    // Functions

    public function createTeam($team_name, $leader_id)
    {
        $default_no_of_sprints = 4; //sets no of sprints in new Team
        $newTeam = createTeamDB($team_name, $leader_id); //creates Team in DB and assigns creator as Leader
        addMember($leader_id, $newTeam->id); //adds creator to created Team's member-list
        $newTeamBacklog = createBacklog($newTeamId, $default_no_0f_sprints); //create Backlog for created Team
        createSprints($newTeamBacklog->id, $default_no_of_sprints); // create Sprints for created team
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
        $newTeam = Team::create(['name'=>$team_name, 'leader_id'=>$leader_id ]);
        return $newTeam;
    }

    private function createBacklog($teamId, $default_no_of_sprints)
    {
        $default_no_0f_sprints = 4;
        $newTeamBacklog = Backlog::create(['team_id'=>$teamId, 'no_of_sprints'=>$default_no_of_sprints]);
        return $newTeamBacklog;
    }

    private function createSprints($backlogId, $default_no_of_sprints)
    {
        for($x=0; $x<$default_no_of_sprints; $x++)
        {
            Sprint::create(['backlog_id'=>$backlog_id, 'sprint_no'=>$x ]);
        }
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
