@extends('layouts.app')

@section('content')

    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Dashboard</h1>
        <div class="well card m-3 p-3">
            <h4>Team leader:</h4>
            {{$team->leader_id}} : {{ App\User::find($team->leader_id)->name }}
        </div>
        <div class="well card m-3 p-3">
            <h4>Team members :</h4>
            <!-- Member list -->
            @foreach($team->users as $user)
                {{$user->id}} : {{$user->name}} <br>
            @endforeach
        </div>

        <div>
            <!-- Add Exception for new user without team -->
            @foreach($team->backlog->sprints as $sprint)
                <div class="well card m-3 p-3" id="sprint {{$sprint->sprint_no}}">
                    <!-- Sprint -->
                     <h3>Sprint {{$sprint->sprint_no}} ({{$sprint->id}})</h3>
                     <hr>
                     Tasks ({{count($sprint->tasks)}}) :
                        @foreach($sprint->tasks as $task)
                            <div class="card m-1 p-3">
                                <!-- Task -->
                                <h5> {{$task->title}} </h5>
                                    {{$task->description}}
                                <br>
                                    <i>Comments : </i>
                                    <small>
                                        @foreach($task->comments as $comment)
                                            <div>
                                                <b>{{App\User::find($comment->commentor_id)->name}}</b> <br>
                                                {{$comment->content}}
                                            </div>
                                        @endforeach
                                    </small>
                            </div>
                        @endforeach
                        <div>
                            <a href="">
                                <button>Add Task</button>
                            </a> 
                        </div>
                        
                </div>
            @endforeach 
            
        </div>
    </div>

@endsection