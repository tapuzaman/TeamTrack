<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="{{ asset('template/scripts/extras.1.1.0.min.js') }}"></script>
<script src="{{ asset('template/scripts/shards-dashboards.1.1.0.min.js') }}"></script>
<script src="{{ asset('template/scripts/app/app-blog-overview.1.1.0.js') }}"></script>


<script type="text/javascript">

          $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
          });

          $(".sidebar-link").click(function(e){
               e.preventDefault();

               // Load the content from the link's href attribute
               $('.py-4').load( $(this).attr('href').concat(' .py-4') );
               //Change url in browser addressbar
               window.history.pushState("object or string", "Title", $(this).attr('href') );
          });

          $(".add-task-modal").click(function(e){
               document.getElementById("sprint-id-text-field").value = $(this).attr('href');
          });

          $(".new-task-submit").click(function(e){
               e.preventDefault();

               var sprintId = $("input[name=sprintId]").val();
               var assignedTo = $("select[name=assignedTo]").val();
               var title = $("input[name=title]").val();
               var description = $("textarea[name=description]").val();

               $.ajax({
               type:'POST',
               url:'/tasks/create',
               data:{sprintId:sprintId, assignedTo:assignedTo, title:title, description:description},
               success:function(data){
                    alert(data.message);
               }
               });

          });


     </script>