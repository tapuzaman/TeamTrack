@extends('layouts.app')

@section('content')

    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Members</h1>
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
        <br>
        <hr>

        <!-- Button trigger newMemberModal -->
       
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newMemberModal">
                Add Member
            </button>
        </a>
        

        @include('modals.new_member_modal')

    </div>

@endsection