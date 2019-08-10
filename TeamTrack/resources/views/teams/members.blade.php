@extends('layouts.app')

@section('content')

    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Members</h1>

        <div class="well card m-3 p-3">
            <div class="team-leader">
                <h4>Team leader:</h4>
                {{$team->leader_id}} : {{ App\User::find($team->leader_id)->name }}
            </div>
        </div>
        <div class="well card m-3 p-3">
            <div class="team-member">
                <h4>Team members :</h4>
                <!-- Member list -->
                @foreach($team->users as $user)
                    {{$user->id}} : {{$user->name}} <br>
                @endforeach
            </div>
        </div>

        <br>

        <!-- Button trigger newMemberModal -->
       
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMemberModal">
                Add Member
            </button>
        </a>
        

        @include('modals.new_member_modal')

    </div>

@endsection