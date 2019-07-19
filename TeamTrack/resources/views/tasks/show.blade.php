@extends('layouts.app')

@section('content')

    <div id="container">

        <a href="/tasks/{{$task->id}}/edit" class="btn btn-primary float-left" text-decoration="none">Edit</a>
        <!--DELETE BUTTON -->
        {!!Form::open(['action'=>['TasksController@destroy',$task->id],'method'=>'POST'])!!}
			{{Form::hidden('_method','DELETE')}}
			{{Form::submit('Delete',['class'=>'btn btn-danger'])}}
		{!!Form::close()!!}

        <h1>{{$task->title}}</h1>
        <div>
            {{$task->description}}
        </div>

        <hr>
        <small>Written on {{$task->created_at}}</small>
    </div>

@endsection