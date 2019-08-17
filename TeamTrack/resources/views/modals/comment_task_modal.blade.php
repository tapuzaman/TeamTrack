<!-- Comment Task Modal -->
<div class="modal fade" id="commentTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    {!! Form::open(['action' =>  ['TasksController@update', ''], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Comment Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                    {{Form::submit('Post Comment', ['class'=>'btn btn-primary comment-task-submit', 'data-dismiss'=>'modal'])}}
                </div>
                
            </div>
        </div>
    {!! Form::close() !!}
</div>