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

        $team_name = $request->input('name');
        $leader_id = Auth::id();
        $newTeam = Team::createTeam($team_name, $leader_id);

        return redirect('/home');
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
        Auth::user()->setCurrentTeamId($id);

        $members = Team::find(Auth::user()->getCurrentTeamId())->members;
        $membersArray;

        foreach($members as $member)
        {
            $membersArray[$member->id] = $member->name;
        }

        return view('teams.show')->with('team',$team)->with('members', $membersArray);
    }

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
