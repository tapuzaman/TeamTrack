<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Team;
use App\User; 

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //delete this later
    {
        $teams = User::find(Auth::id())->teams;
        return view('teams.index')->with('teams',$teams);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function masterindex()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams',$teams);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // delete later
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        //add new Team
        $newTeam = Team::create(['name' => $request->input('name'), 'leader_id'=>Auth::id() ]);
        //add this user to the new team
        Team::addMemberByEmail(Auth::user()->email, $newTeam->id);
        
        Auth::user()->setCurrentTeamId($newTeam->id);
        return view('teams.show')->with('team',$newTeam);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        Auth::user()->setCurrentTeamId($team->id);
        //User::setCurrentTeamId(1);
        //return Auth::user()->currentTeam();
        return view('teams.show')->with('team',$team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // addMember() loads the view and storeMember() stores the data to DB
    public function members($id)
    {     
        $team = Team::find($id);
        Auth::user()->setCurrentTeamId($team->id);
        return view('teams.members')->with('team',$team);
    }

    public function storeMember(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'team_id'=>'required'
        ]);

        Auth::user()->setCurrentTeamId($request->input('team_id'));
        //TODO : add access control, check if Team belongs to this user
        Team::addMemberByEmail($request->input('email'), $request->input('team_id') );

        return back();
    }

    public function removeMember($id)
    {

    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
