@extends('layouts.app')

@section('content')

    <div id="container">

        @if( $team->leader_id == Auth::id() )
            <a href="/teams/addMember/{{$team->id}}" class="btn btn-primary float-left" text-decoration="none">Add Member</a>
            <br><br>
        @endif

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