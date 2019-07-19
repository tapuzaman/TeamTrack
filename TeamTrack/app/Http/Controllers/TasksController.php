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
            'body'=> 'required'
        ]);

        //Create Task

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $taskID
     * @return \Illuminate\Http\Response
     */
    public function show($taskID)
    {
        //fetching task data from the task table database
        
    $task= Task::find($taskID);
    return view('tasks.show')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $taskID
     * @return \Illuminate\Http\Response
     */
    public function edit($taskID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $taskID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $taskID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $taskID
     * @return \Illuminate\Http\Response
     */
    public function destroy($taskID)
    {
        //
    }
}
