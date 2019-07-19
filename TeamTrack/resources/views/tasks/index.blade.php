@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">ALL TASKS</span>
        </div>
    </div>

    @if(count($tasks)>0)
        @foreach($tasks as $task)
        <div class="well card m-3 p-3">
            <h3><a href = "/tasks/{{$task->taskID}}">{{$task->title}}</a></h3>

            <small>Written on {{$task->created_at}}</small>
        </div>
        @endforeach
    @else
    <p> No Posts Found</p>
    @endif
@endsection