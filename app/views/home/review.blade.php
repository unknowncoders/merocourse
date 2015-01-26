@extends('layouts.review_default')

@section('review')
{{HTML::script('js/jq.js')}}
{{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js')}}
{{HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js')}}

<div class ="container">
         
       <h3>{{$subjectname->subject_name}}</h3>
    
           <hr>

         
      <div class="row">
          
          <div class ="col-sm-2">
               <div class ="thumbnail">

                     <button type ="button" id ="showreview">Review</button>
                     <button type ="button" id ="shownewreview">New Review</button>
                     <button type ="button" id ="showother">Resources</button>


                  
               </div>
                 
        </div>
       <div class ="col-sm-10">
          <div class ="thumbnail">

                    <!--show review -->

                     <div id ="div1">
            
              @for($i = 0; $i < sizeof($username); $i++)
                      {{$username[$i]->username}}
                      {{$review[$i]->content}}
                      {{$review[$i]->like}}
                      {{$review[$i]->dislike}}
                         
                        <br>
                 @endfor    
                  </div>
                   
<!-- show new review -->
                    <div id ="div2" style = "display:none">this is new review
                    
             {{Form::open(array('method' =>'post' ,  'id' =>'comment'))}} 
                {{Form::label('name','Text')}}
                {{Form::text('username',null,array('id'=>'name', 'name'=>'name'))}}
                {{Form::submit('submit', array('name'=>'submit'))}}

                    </div>

<!-- show resouces -->
                    <div id ="div3" style ="display:none">this is other page
                     </div>

         </div>
       </div>
            </div>
</div>


<script>


$(document).ready(function(){

                    
        $("#shownewreview").click(function(){
                       $("#div1").hide();
                        $("#div2").show();
                        $("#div3").hide();
          });

        $("#showother").click(function(){
                         $("#div1").hide();
                        $("#div2").hide();
                        $("#div3").show();
               });

        $("#showreview").click(function()
                {
                        $("#div1").show();
                        $("#div2").hide();
                        $("#div3").hide();
                });

        $('#comment').on('submit', function(e){
               e.preventDefault();
          
               var host = "{{URL::to('/')}}";
               var name = $('#name').val();

               $.ajax({
                    type: "POST",
                            url: host + '/newreview',
                            data: {name: name},
                            success:function(msg){
                                    $("#comment")[0].reset();
                                    alert(msg);
                            }
               });
 
        }); 
});

</script>

@stop
