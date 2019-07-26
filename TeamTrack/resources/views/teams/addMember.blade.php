@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">ADD MEMBER TO TEAM</span>
        </div>
        <h3>{{$team->name}}</h3>
    </div>

    <div class="container">
        {!! Form::open(['action' => 'TeamsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Add Member by email')}}
                <!-- replace with list later -->
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter member email'])}}
            </div>
        {{Form::submit('Add Member', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>

@endsection