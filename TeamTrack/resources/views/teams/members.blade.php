
    <div id="container">

        <h1>{{$team->name}} Members</h1>
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

        @foreach($team->backlog->sprints as $sprint)
            <p>
                Sprint : {{$sprint->sprint_no}} . {{count($sprint->tasks)}} tasks
                    @foreach($sprint->tasks as $task)
                        <p>
                            <h5> {{$task->title}} </h5>
                                {{$task->description}}
                            <br>
                                <i>Comments : </i>
                                <small>
                                    @foreach($task->comments as $comment)
                                        <div>
                                            <b>{{App\User::find($comment->commentor_id)->name}}</b> <br>
                                            {{$comment->content}}
                                        </div>
                                    @endforeach
                                </small>
                        </p>
                        <hr>
                    @endforeach
            </p>
            <hr>
        @endforeach 

        <hr>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Add Member
        </button>

        <!-- Add member Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        {!! Form::open(['action' => 'TeamsController@storeMember', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add member by email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <!-- make this hidden later -->
                            <div class="form-group" hidden>
                                {{Form::label('team_id', 'Team to add to')}}
                                {{Form::text('team_id', $team->id, ['class' => 'form-control', 'placeholder' => 'Enter member email'])}}
                            </div>
                            <div class="form-group">
                                <!-- replace with list later -->
                                {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email address'])}}
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {{Form::submit('Add Member', ['class'=>'btn btn-primary'])}}
                    </div>
                    
                </div>
            </div>
        {!! Form::close() !!}
        </div>

    </div>
