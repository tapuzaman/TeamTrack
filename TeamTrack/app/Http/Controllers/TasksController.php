<?php

use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Task;
use App\Team;
use Validator;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks=Task::all();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sprintId)
    {
        $members = Team::find(Auth::user()->getCurrentTeamId())->members;
        $membersArray;

        foreach($members as $member)
        {
            $membersArray[$member->id] = $member->name;
        }

        //create the task form
        return view('tasks.create')->with('sprintId', $sprintId)
                                   ->with('members', $membersArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'sprintId'=>'required',
            'assignedTo'=>'required',
        ]);


        if ($validator->passes()) {

            //Create Task 
            $title = $request->title;
            $description = $request->description;
            $sprintId = $request->sprintId;
            $assignedTo = $request->assignedTo;
            Task::createTask($sprintId, $assignedTo, Auth::id(), $title, $description); //TODO : change input

            return response()->json(['message'=>'done']);
        }
        else if($validator->fails())
        {
            return response()->json(['message'=>$validator->errors()->all()]);
        }

        //return redirect('/teams/'.Auth::user()->getCurrentTeamId());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //fetching task data from the task table database
        $task= Task::find($id);
        return view('tasks.show')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'description'=> 'required'
        ]);

        //update Task 
        //Task::updateTask()
        // $task = Task::find($id);
        // $task->team_id = 1; // Dummy team_id
        // $task->user_id = 0; // Dummy user_id (assigned by)
        // $task->created_by = 1; // Dummy cretaed_by
        // $task->title = $request->input('title');
        // $task->description = $request->input('description');
        // $task->sprint_no = 1; //Dummy sprint ID
        // $task->due_date = now();
        // $task->is_completed = false;
        // $task->save();

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->json(['message'=>'done']);
    }
}
