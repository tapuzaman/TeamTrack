@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">ADD TASK</span>
        </div>
    </div>

    <div class="container">
        {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Task Name')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Task Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Task Description')}}
                {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Task Description'])}}
            </div>
        {{Form::submit('Add Task', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection