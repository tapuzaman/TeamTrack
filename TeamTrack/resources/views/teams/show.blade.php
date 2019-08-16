@extends('layouts.app')

@section('content')



    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Dashboard</h1>
<!-- 
        <div class="well card m-3 p-3">
            <div class="team-leader">
                <h4>Team leader:</h4>
                {{$team->leader_id}} : {{ App\User::find($team->leader_id)->name }}
            </div>
        </div>
        <div class="well card m-3 p-3 ">
            <div class="team-member">
                <h4>Team members :</h4>
                
                @foreach($team->users as $user)
                    {{$user->id}} : {{$user->name}} <br>
                @endforeach
            </div>
        </div> -->

        <hr>

        <div>

            <a class="new-sprint-submit">
                <button class="btn btn-primary">Add Sprint</button>
            </a> 
            <br><br>

            <div class="sprint-view">

                {{count($team->backlog->sprints)}} Sprints
                <hr>

                <!-- Add Exception for new user without team -->
                @foreach($team->backlog->sprints as $sprint)
                    <div class="well card m-3 p-3 ">
                        <div class="sprint{{$sprint->id}}">

                        <!-- Sprint -->
                        <h3>Sprint {{$sprint->sprint_no}} ({{$sprint->id}})</h3>

                        <!-- <a href="/tasks/create/{{$sprint->id}}">
                            <button class="btn btn-primary">Add Task</button>
                        </a> -->

                        <a href="{{$sprint->id}}"  class="add-task-modal" data-toggle="modal" data-target="#newTaskModal">
                            <button class="btn btn-primary">Add Task</button>
                        </a>

                        <button 
                            class="delete-sprint btn btn-primary"
                            sprintId="{{$sprint->id}}"
                        >
                            Delete Sprint 
                        </button>

                        <hr>
                        Tasks ({{count($sprint->tasks)}}) :
                            @foreach($sprint->tasks as $task)
                                <div class="card m-1 p-3">
                                    <div id="task{{$task->id}}">
                                    <!-- Task -->
        
                                    <h5 id="taskTitle"> {{$task->title}} </h5>
                                     <h6 id="taskDescription"> {{$task->description}} </h6>
                                     <h6 id="taskSprintId" hidden>{{$sprint->id}}</h6>
                                     <h6 id="taskAssignedToId" hidden>{{$task->user_id}}</h6>
                                    
                                    <div>
                                        
                                        <button 
                                            class="btn btn-primary edit-task-modal" 
                                            taskId="{{$task->id}}" 
                                            sprint="{{$sprint->id}}" 
                                            data-toggle="modal" 
                                            data-target="#editTaskModal"
                                        >
                                            Edit
                                        </button>
                                        

                                        <a href="{{$task->id}}" sprint="{{$sprint->id}}" class="delete-task">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </div>
                                   
                                    <hr>
                                        <div id="task{{$task->id}}AssignedTo" hidden>{{App\User::find($task->user_id)->id}}</div>
                                        Assigned to : {{App\User::find($task->user_id)->name}} <br>
                                        Created by : {{App\User::find($task->created_by)->name}}
                                    
                                        <!-- <hr> <i>Comments </i> -->
                                        <small>
                                            @foreach($task->comments as $comment)
                                                <div>
                                                    <b>{{App\User::find($comment->commentor_id)->name}}</b> <br>
                                                    {{$comment->content}}
                                                </div>
                                            @endforeach
                                        </small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                            
                    </div>
                @endforeach 
            </div>
        </div>
    </div>

    <style type="text/javascript">
        
    </style>

    
    @include('modals.new_task_modal')
    @include('modals.edit_task_modal')

@endsection