<!-- New Team Modal -->
<div class="modal fade" id="newTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    {!! Form::open(['action' => 'TeamsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Create New Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                        <!-- make this hidden later -->
                        <div class="form-group">
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Choose a team name', 'maxlength' => 180])}}
                        </div>
                   
                </div>
                <div class="modal-footer">
                    {{Form::submit('Create Team', ['class'=>'btn btn-primary'])}}
                </div>
                
            </div>
        </div>
    {!! Form::close() !!}
</div>