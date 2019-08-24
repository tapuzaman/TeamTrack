<!-- New Member Modal -->
<div class="modal fade" id="newMemberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    {!! Form::open(['action' => 'MembersController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Member by email</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email address', 'maxlength' => 180])}}
                    </div>
                </div>
                <div class="modal-footer">
                <a class="new-member-submit">
                    {{Form::submit('Add Member', ['class'=>'btn btn-primary new-task-submit', 'data-dismiss'=>'modal'])}}
                </a>
                </div>
                
            </div>
        </div>
    {!! Form::close() !!}
</div>