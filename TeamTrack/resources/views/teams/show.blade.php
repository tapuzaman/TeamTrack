@extends('layouts.app')

@section('content')

    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Dashboard</h1>
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