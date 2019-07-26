@extends('layouts.app')

@section('content')

    <div id="container">

        <a href="/teams/{{$team->id}}/edit" class="btn btn-primary float-left" text-decoration="none">Add Member</a>
        <br><br>

        <h1>{{$team->name}}</h1>
        <div>
            <i>Team leader:</i>
            <br>
            {{ App\User::find($team->leader_id)->name }}
        </div>
        <hr>
        <div>
            <i>Team members :</i>
            <br>
                @foreach($team->users as $user)
                    {{$user->id}} : {{$user->name}} <br>
                @endforeach
        </div>
    </div>

@endsection