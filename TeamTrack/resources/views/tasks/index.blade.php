@extends('layouts.template')
@section('content')
<h1>Tasks</h1>
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