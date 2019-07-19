@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">TASKS</span>
        </div>
    </div>

    @if(count($tasks)>0)
        @foreach($tasks as $task)
        <div class="well">
        <h3><a href = "/tasks/{{$task->id}}">{{$task->Task}}</a></h3>

        <small>Written on {{$task->created_at}}</small>
        </div>
        @endforeach
    @else
    <p> No Posts Found</p>
    @endif
@endsection