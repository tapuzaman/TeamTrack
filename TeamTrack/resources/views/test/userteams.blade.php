@extends('layouts.app')

@section('content')

    <div class="page-header row no-gutters py-0">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">SHOW USER TEAMS</span>
        </div>
    </div>

    @if(count($users)>0)
        @foreach($users as $user)
        <div class="well card m-3 p-3">
            <h3>{{$user->name}}</h3>
                @foreach($user->teams as $team)
                    {{$team->name}} <br>
                @endforeach
        </div>
        @endforeach
    @else
    <p> No Teams Found</p>
    @endif
@endsection