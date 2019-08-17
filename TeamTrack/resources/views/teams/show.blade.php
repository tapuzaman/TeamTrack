@extends('layouts.app')

@section('content')



    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Dashboard</h1>

        <hr>

        <div>

            <a class="new-sprint-submit">
                <button class="btn btn-primary">Add Sprint</button>
            </a> 
            <br><br>

            {{count($team->backlog->sprints)}} Sprints
                <hr>

            <div class="sprint-view rowview">

                <!-- Add Exception for new user without team -->
                @foreach($team->backlog->sprints as $sprint)
                    <div class="well cardview card m-2 p-3">
                        <div class="sprint{{$sprint->id}}">

                        <!-- Sprint -->
                        <h3>Sprint {{$sprint->sprint_no}} ({{$sprint->id}})</h3>

                        <a href="{{$sprint->id}}"  class="add-task-modal" data-toggle="modal" data-target="#newTaskModal">
                            <button class="btn btn-primary">Add Task</button>
                        </a>

                        @can('deleteSprint', $sprint)
                            <button 
                                class="delete-sprint btn btn-danger"
                                sprintId="{{$sprint->id}}"
                            >
                                Delete Sprint 
                            </button>
                        @endcan

                        <hr>
                        Tasks ({{count($sprint->tasks)}}) :
                            @foreach($sprint->tasks as $task)
                                <div class="card m-2 p-3">
                                
                                    <!-- Task -->
                                    <div id="task{{$task->id}}">
                                    <h5 id="taskTitle"> {{$task->title}} ({{$task->id}})</h5>
                                    <h6 id="taskDescription"> {{$task->description}} </h6>
                                    <h6 id="taskSprintId" hidden>{{$sprint->id}}</h6>
                                    <h6 id="taskAssignedToId" hidden>{{$task->user_id}}</h6>
                                   
                                    <hr>
                                        <div id="task{{$task->id}}AssignedTo" hidden>{{App\User::find($task->user_id)->id}}</div>
                                        Assigned to : {{App\User::find($task->user_id)->name}} <br>
                                        Created by : {{App\User::find($task->created_by)->name}}
                                    <br><br>

                                    <div>
                                        @can('updateTask', $task)
                                            <button 
                                                class="edit-task-modal btn btn-primary " 
                                                taskId="{{$task->id}}" 
                                                sprint="{{$sprint->id}}" 
                                                data-toggle="modal" 
                                                data-target="#editTaskModal">
                                                    Edit
                                            </button>
                                            
                                            <button 
                                                class="delete-task btn btn-danger"
                                                taskId="{{$task->id}}"
                                                sprint="{{$sprint->id}}">
                                                    Delete
                                            </button>
                                            </a>
                                        @endcan
                                        
                                    </div>
                                    
                                        <!-- <hr> <i>Comments </i> -->
                                        <small>
                                            @foreach($task->comments as $comment)
                                                <div>
                                                    <br>
                                                    <b>{{App\User::find($comment->commentor_id)->name}} : </b>
                                                        "{{$comment->content}}""
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

    
    @include('modals.new_task_modal')
    @include('modals.edit_task_modal')

@endsection