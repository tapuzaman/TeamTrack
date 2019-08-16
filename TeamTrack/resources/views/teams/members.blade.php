@extends('layouts.app')

@section('content')

    <div id="container">

        <h1 id="pageTitle">{{$team->name}} Members</h1>

        <hr>

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
                <table>
                
                    @foreach($team->users as $user)

                        <!-- Each Member -->
                        <tr>
                            <td class="px-2">
                            {{$user->id}} : {{$user->name}}
                            </td>
                            
                            <td>
                                <!-- Don't display remove btn if user is leader -->
                                <button 
                                    class="remove-member btn btn-outline-danger"
                                    userId="{{$user->id}}"
                                >
                                    Remove 
                                </button>
                            </td>
                            
                        </tr>

                    @endforeach
                </table>
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