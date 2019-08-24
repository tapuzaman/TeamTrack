<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Team;

class MembersController extends Controller
{

    //Store the newly created resource in storage.

    public function store(Request $request)
    {
        $team = Team::find(Auth::user()->getCurrentTeamId());
        $this->authorize('addMember', $team);

        $validator = Validator::make($request->all(), [
            'email'=>'required',
        ]);

        if ($validator->passes()) 
        {
            Team::addMemberByEmail($request->email, Auth::user()->getCurrentTeamId() );
            return response()->json(['message'=>$request->email]);
        }
        else if($validator->fails())
        {
            return response()->json(['error'=>$validator->errors()->all()]);
        }
        
    }


    //Display the specified resource


    public function show($id)
    {
        $team = Team::find($id);
        $this->authorize('viewTeam', $team);
        return view('teams.members')->with('team',$team);
    }

    //Remove the specified resource from storage.

    public function destroy($id)
    {
        $team = Team::find(Auth::user()->getCurrentTeamId());
        $this->authorize('removeMember', $team);
        $memberId = $id;
        $teamId = $team->id;
        Team::removeMember($memberId, $teamId);
        return response()->json(['message'=>$memberId]);
    }

//delete the entire team

    public function deleteTeam($teamId)
    {
        return redirect('/home');
    }

}
