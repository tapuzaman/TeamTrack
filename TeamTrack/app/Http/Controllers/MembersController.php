<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Team;

class MembersController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        // Add a member to a team by email address
    public function store(Request $request)
    {

        if(Auth::id() == $team->leader_id){

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
                return response()->json(['message'=>$validator->errors()->all()]);
            }
        }
        
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
        return view('teams.members')->with('team',$team);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find(Auth::user()->getCurrentTeamId());
        if(Auth::id() == $team->leader_id){
            //$this->authorize('delete', $team);
            $memberId = $id;
            $teamId = $team->id;
            Team::removeMember($memberId, $teamId);
            return response()->json(['message'=>$memberId]);
        }

    }
}
