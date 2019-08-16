<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Team;

class MembersController extends Controller
{


    public function store(Request $request)
    {
        $team = Team::find(Auth::user()->getCurrentTeamId());
        $this->authorize('addMember', $team);

        
    }


    public function show($id)
    {
        $team = Team::find($id);
        return view('teams.members')->with('team',$team);
    }


    public function destroy($id)
    {
        $team = Team::find(Auth::user()->getCurrentTeamId());
        $this->authorize('removeMember', $team);
        $memberId = $id;
        $teamId = $team->id;
        Team::removeMember($memberId, $teamId);
        return response()->json(['message'=>$memberId]);
    }
}
