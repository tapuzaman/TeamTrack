@extends('layouts.app')

@section('content')
    <!-- Button trigger modal newTaskModal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTaskModal">
    Launch demo modal
    </button>

    <!-- Button trigger modal 2-->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal2">
    Launch demo modal
    </button>

<!-- Add Team Modal -->
<div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    {!! Form::open(['action' => 'TasksController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        {{Form::label('sprintId', 'Sprint Id')}}
                        {{Form::text('sprintId', 9, ['class' => 'form-control', 'placeholder' => 'Sprint Id'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('assignedTo', 'Assign Task to')}}
                        {{Form::select('assignedTo', [], 12, ['class' => 'form-control', "placeholder" => "Pick member"])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('title', 'Task Name')}}
                        {{Form::text('title', 'Default Title', ['class' => 'form-control', 'placeholder' => 'Task Name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Task Description')}}
                        {{Form::textarea('description', 'Default Descrption', ['class' => 'form-control', 'placeholder' => 'Task Description'])}}
                    </div>
                <div class="modal-footer">
                    {{Form::submit('Add Task', ['class'=>'btn btn-primary'])}}
                </div>
                
            </div>
        </div>
    {!! Form::close() !!}
</div>

    <!-- Modal 1-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal 2-->
    <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal 2 title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>

@endsection


















<!-- <!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.7 Ajax Request example</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>


<body>

    <div class="container">
        <h1 id="title">Laravel 5.7 Ajax Request example</h1>

        <form >
            <div class="form-group">
                <label>Name:</label>

                <input type="text" name="name" class="form-control" placeholder="Name" required="">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Email" required="">
            </div>
            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>


     <script type="text/javascript">

          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });

          $(".btn-submit").click(function(e){
               e.preventDefault();

               var name = $("input[name=name]").val();
               var password = $("input[name=password]").val();
               var email = $("input[name=email]").val();

               $.ajax({
                    type:'POST',
                    url:'/ajaxRequest',
                    data:{name:name, password:password, email:email},
                    success:function(data){
                         $("#title").html(data.success);
                    }
               });
          });

     </script>

</html> -->