@extends('layouts.app')

@section('content')

    <div id="container">

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