@extends('layouts.app')

@section('content')

    <div id="container">
        <h1>{{$task->title}}</h1>
        <div>
            {{$task->description}}
        </div>

        <hr>
        <small>Written on {{$task->created_at}}</small>
    </div>

@endsection