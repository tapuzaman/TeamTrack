@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">CREATE TEAM</span>
        </div>
    </div>

    <div class="container">
        {!! Form::open(['action' => 'TeamsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Team Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Team Name'])}}
            </div>
        {{Form::submit('Create Team', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection