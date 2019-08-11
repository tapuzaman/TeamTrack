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

          document.onload = initializeFunctions();

          function initializeFunctions()
          {
               //setSidebar();
               newSprint();
               setSprintId();
               newTask();
               newMember();
               deleteTask();
          }


          function setSidebar()
          {
               console.log('setSidebar');
               $(".sidebar-link").click(function(e){
                    e.preventDefault();
                    // Load the content from the link's href attribute
                    $('.content').load( $(this).attr('href').concat(' .content'), function(responseText, textStatus, XMLHttpRequest){
                              newSprint();
                              //newMember();
                         });

                    //Change window location
                    //window.location.replace($(this).attr('href'));
                    window.history.pushState('', 'Title', $(this).attr('href'));
               });
          }
          



          function setSprintId()
          {
               console.log('setSprintId');
               $(".add-task-modal").click(function(e){
                    console.log("hit sprintId ");
                    document.getElementById("sprint-id-text-field").value = $(this).attr('href');
               });
          }
          


          function newTask()
          {
               console.log('newTask');
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
                         $('.sprint'.concat(sprintId)).load( window.location.pathname.concat(' .sprint'.concat(sprintId)), function(responseText, textStatus, XMLHttpRequest){
                              setSprintId();
                              deleteTask();
                          }
                         );
                    } 
                    });
               });
          }

          function deleteTask()
          {
               console.log('deleteTask');
               $(".delete-task").click(function(e){
                    e.preventDefault();
                    console.log("Delete task : ".concat($(this).attr('href')));
                    console.log(window.location.pathname);

                    $.ajax({
                    type:'DELETE',
                    url: '/tasks/'.concat( $(this).attr('href') ),
                    success:function(data){
                         $('.sprint-view').load( window.location.pathname.concat(' .sprint-view'),function(responseText, textStatus, XMLHttpRequest){
                              setSprintId();
                              deleteTask();
                          });
                         console.log(data.message);  
                         console.log(window.location.pathname);
                    } 
                    });
               });
          }

          

          function newSprint()
          {
               console.log('newSprint');
               $(".new-sprint-submit").click(function(e){
                    e.preventDefault();

                    console.log("new sprint called");

                    $.ajax({
                    type:'POST',
                    url:'/sprints',
                    success:function(data){
                         console.log(window.location.pathname);
                         //console.log(data.message);
                         //location.reload();
                         $('.sprint-view').load( window.location.pathname.concat(' .sprint-view'),function(responseText, textStatus, XMLHttpRequest){
                              setSprintId();
                              deleteTask();
                         });

                    } 
                    });
               });
          }


          function newMember()
          {
               console.log('newMember');
               $(".new-member-submit").click(function(e){
                    e.preventDefault();

                    console.log("new member called");
                    var email = $("input[name=email]").val();

                    $.ajax({
                    type:'POST',
                    url:'/members',
                    data:{email:email},
                    success:function(data){
                         console.log(window.location.pathname);
                         console.log(data.message);
                         $('.team-member').load( window.location.pathname.concat(' .team-member') );
                    } 
                    });
               });
          }
          


     </script>