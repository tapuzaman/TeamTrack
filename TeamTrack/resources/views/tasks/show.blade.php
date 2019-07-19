@extends('layouts.app')

@section('content')

    <div id="container">
        <h1>{{$task->Task}}</h1>
        <div>
            {{$task->Description}}
        </div>

        <hr>
        <small>Written on {{$task->created_at}}</small>
    </div>

@endsection