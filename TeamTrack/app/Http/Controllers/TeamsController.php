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
    public function index()
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
    public function create()
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
        User::addUserToTeamByEmail(Auth::user()->email, $newTeam->id);

        return redirect ('/teamsmasterindex');
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
        return view('teams.show')->with('team',$team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // addMember() loads the view and storeMember() stores the data to DB
    public function addMember($id)
    {     
        $team = Team::find($id);
        //only team leader can add members
        if($team->leader_id == Auth::id()){
            return view('teams.addMember')->with('team',$team);
        }
        else{
            return view('\home');
        }
        
        
    }

    public function storeMember(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'team_id'=>'required'
        ]);

        //TODO : add access control, check if Team belongs to this user
        User::addUserToTeamByEmail($request->input('email'), $request->input('team_id') );

        return redirect ('/teamsmasterindex');
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
