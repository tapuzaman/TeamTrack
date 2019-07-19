@extends('layouts.template')
@section('content')

<h1>Create Task</h1>
{!! Form::open(['action' => 'TasksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Task Name')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Task Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Description')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Task Description'])}}
        </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
@endsection