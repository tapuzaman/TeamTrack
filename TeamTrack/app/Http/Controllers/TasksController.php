<?php

use Illuminate\Support\Facades\DB;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;
use App\Task;

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
    public function create()
    {
        //create the task form
        return view('tasks.create');
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
            'title'=>'required',
            'description'=> 'required'
        ]);

        //Create Task 
        $task = new Task;
        $task->team_id = 1; // Dummy team_id
        $task->user_id = 0;  // Dummy user_id (assigned by)
        $task->created_by = 1; // Dummy cretaed_by
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->sprint_no = 1; //Dummy sprint ID 
        $task->due_date = now();
        $task->is_completed = false;
        $task->save();

        return redirect('/tasks');
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
        $task = Task::find($id);
        $task->team_id = 1; // Dummy team_id
        $task->user_id = 0; // Dummy user_id (assigned by)
        $task->created_by = 1; // Dummy cretaed_by
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->sprint_no = 1; //Dummy sprint ID
        $task->due_date = now();
        $task->is_completed = false;
        $task->save();

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
        return redirect('/tasks')->with('success','Book deleted');
    }
}
