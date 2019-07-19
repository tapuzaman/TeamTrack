@extends('layouts.template')
@section('content')
<a href = "/tasks" class= "btn btn-default">Go Back</a>
<h1>{{$task->Task}}</h1>
<div>
    {{$task->Description}}
</div>

<hr>
<small>Written on {{$task->created_at}}</small>

@endsection