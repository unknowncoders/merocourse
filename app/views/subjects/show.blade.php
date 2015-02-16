@extends('layouts.default')

@section('title')
        {{ $subject->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

{{HTML::style('css/responsive-tabs.css')}}
{{HTML::style('css/style.css')}}
{{HTML::style('css/review.css')}}


<div class ="container">
<br/><br/>
<div class ="col-sm-8 ">
<h3>{{$subject->name}}</h3>
</div>

<div class ="col-sm-4 thumbnail " >
<!--to reload the div after the rating is enter by the user -->
<div id = "mathiko">
<div class ="col-sm-7   "><h5> Difficulty Rating:</h5></div>
<div class ="col-sm-5  ">

@for($i = 0; $i<5; $i++)
 
@if($i<$subject->difficulty_rating)

<div class ="stardiff"><h5>★ </h5></div>

@else 
        
<div class ="starwhite"><h5> ☆ </h5></div>

@endif
  
@endfor

</div>
<div class ="col-sm-7 "><h5>Interest Rating:</h5></div>

<div class ="col-sm-5 ">

 @for($i = 0; $i<5; $i++)
 
@if($i<$subject->interest_rating)

<div class="starint"><h5>★ </h5></div>

@else
<div class="starwhite"><h5> ☆ </h5></div>
@endif
  
@endfor

</div>
</div>
<div class ="col-sm-7 "><h5> Full Marks:</h5></div>
<div class ="col-sm-5 "><h5> {{ $subject->fullMarks }}</h5> </div>

</div>

<div class = "col-sm-13 thumbnail"> 

<div id = "horizontalTab">
        <ul>
            <li><a href="#tab-1"><h4>Review</h4></a></li>
            <li><a href="#tab-2"><h4> Your Thoughts</h4></a></li>
            <li><a href="#tab-3"><h4>Resources</h4></a></li>
        </ul>
<!-- to show review-->

            <div id="tab-1">
            <div class ="info"> 
               
            <div id = "thapa"> 
              
            <div class="col-sm-13 ">
            
            <div class="col-sm-13">
                 <div class ="navbar-collapse collapse">
                  <ul class ="nav navbar-nav navbar-right">
                
                      <li><a href = ""><h5>View Review By :</h5></a></li>
                      <li class ="dropdown">
                      <a href="#" class ="dropdown-toggle" data-toggle ="dropdown">
                      <h5><b class ="caret"></b></h5></a>
                      </a>
                  
                  <ul class ="dropdown-menu">
                  <li><a href ="#" onclick = "viewby()" data-toggle="modal"class ="sans"><h5>Most Recent</h5></a>  </li>
                  <li><a href = "#" onclick = "viewby()" data-toggle="modal"class ="sans"><h5>Most Popular </h5></a></li>
                  </ul>

                  </li>

                  </ul>   

              </div>
            <br><br><br>
             </div> 
                     @foreach($reviews as $review)

                <div class ="col-sm-3 "> 
                  <h4><i class="fa fa-user fa-2x" style="margin-right:10px"></i>{{ link_to("/users/{$review->user->id}",$review->user->name) }}</h4> 
                </div>

                 <div class = "col-sm-9  " >
                    <br>
                       {{ $review->content }}
                    <br>
                </div>

                   
                <div class ="col-sm-13 " style ="text-align:right">
                  
                  @if( $review->usr_vote == -1)
                            
                     {{ $review->upvote }}
                   <button   id = "up"  type="button" onclick= "voting({{$review->id}},1)" ><i class="fa fa-thumbs-o-up"></i></button>
                     {{ $review->downvote }}
                   <button id ="down"  type="button" onclick= "voting({{$review->id}},0)"><i class="fa fa-thumbs-o-down"></i></button>
                
                 @elseif($review->usr_vote == 0)

                     {{ $review->upvote }}
                   <button   type="button" onclick="voting({{$review->id}},1)"><i class="fa fa-thumbs-o-up"></i></button>
                     {{ $review->downvote }}
                   <button  type="button" onclick="voting({{$review->id}},0)"><i class="fa fa-thumbs-down"></i></button>
                 
                  @elseif($review->usr_vote == 1)

                     {{ $review->upvote }}
                   <button type="button" onclick="voting({{$review->id}},1)"><i class="fa fa-thumbs-up"></i></button>
                     {{ $review->downvote }}
                   <button  type="button" onclick="voting({{$review->id}},0)"><i class="fa fa-thumbs-o-down"></i></button>
                 @endif
                   
              <hr>

               </div>
                
                @endforeach
                
               </div>

               </div>
           
             </div> 
             </div>


<!--to show new review-->

             <div id ="tab-2">
             <div class ="info">
           
  <!--to refresh the difficulty_rating and interest_rating of the user-->
           <div id = "talako">             
              <div class ="thumbnail"> 
     
             @if($diff_rate == null || $diff_rate == "")

                      <h5>
                       <div class ="col-sm-3"  > {{Form::label('diff_rate','Difficulty Rating: ')}}</div>
                      </h5>
                 
                       <div class ="col-sm-9 ">

                    <h5>
                      <div  class="score ">
                      <div id ="difficulty"> 
                          <input class ="mahen" type="radio" id="score-5" name="score" value="5"/>
                          <label title="5 stars" for="score-5">5 stars</label>
  
                          <input class ="mahen" type="radio" id="score-4" name="score" value="4"/>
                          <label title="4 stars" for="score-4">4 stars</label>
  
                          <input class ="mahen" type="radio" id="score-3" name="score" value="3"/>
                          <label title="3 stars" for="score-3">3 stars</label>
  
                          <input class ="mahen" type="radio" id="score-2" name="score" value="2"/>
                          <label title="2 stars" for="score-2">2 stars</label>
  
                          <input class ="mahen"  type="radio" id="score-1" name="score" value="1"/>
                          <label title="1 stars" for="score-1">1 stars</label>
                       </div>
                       </div>
                     </h5>   
                    </div>

                      <h5>
                       <div class ="col-sm-3 "  > {{Form::label('int_rate','Interest Rating: ')}}</div>
                      </h5>
                 
                      <div class ="col-sm-9 ">
                      <div  class="score1 ">
                      <div id ="interest">   
                          <input class ="mahen" type="radio" id="score-6" name="score1" value="5"/>
                          <label title="5 stars" for="score-6">5 stars</label>
  
                          <input class ="mahen" type="radio" id="score-7" name="score1" value="4"/>
                          <label title="4 stars" for="score-7">4 stars</label>
  
                          <input class ="mahen" type="radio" id="score-8" name="score1" value="3"/>
                          <label title="3 stars" for="score-8">3 stars</label>
  
                          <input class ="mahen" type="radio" id="score-9" name="score1" value="2"/>
                          <label title="2 stars" for="score-9">2 stars</label>
  
                          <input class ="mahen"  type="radio" id="score-10" name="score1" value="1"/>
                          <label title="1 stars" for="score-10">1 stars</label>
                       </div> 
                       </div>
                        <hr>    
                       </div>

                 <button  type="button" style ="margin-right:15px"  onclick="rating()" class ="btn btn-primary rightshift" >Rate</button>
                 @else
                  <div class ="col-sm-4   ">
                  <h5><strong>Your Difficulty Rating </strong></h5></div>
                  <div class ="col-sm-7  ">

                      @for($i = 0; $i<5; $i++)
 
                      @if($i<$diff_rate)

                        <div class ="stardiff"><h5>★ </h5></div>

                      @else 
        
                         <div class ="starwhite"><h5> ☆ </h5></div>

                      @endif
  
                      @endfor

                   </div>

                  <div class ="col-sm-4 ">
                  <h5><strong>Your Interest Rating</strong></h5></div>

                  <div class ="col-sm-7 ">

                  @for($i = 0; $i<5; $i++)
 
                    @if($i<$int_rate)

                    <div class="starint"><h5>★ </h5></div>

                    @else
                    <div class="starwhite"><h5> ☆ </h5></div>
                    @endif
  
                    @endfor

                </div>

                @endif

                 </div>
                </div>

           <div id = "already_written">                
               @if($already_written == null || $already_written == "")
                  <div class  = "col-sm-3"> 
                          <h5>  {{Form::label('name','Your Review')}}</h5>
                           </div>
              
                       <div class ="col-sm-9 ">
                        <p> {{Form::textarea('username',null,array('id'=>'name', 'name'=>'name', 'style' => 'width:100%; height: 350px','placeholder' =>'You can also use html tags such as <h4>, <br>' ))}}
                        </p>      
                        <hr>    
                        </div>
                                  <br/>
                   <div class ="col-sm-13">

                 <button  type="button"  onclick="postreview()" class ="btn btn-primary rightshift" >Submit</button>
                  
                   <br/><br/>
                   </div>
                @else
                
                  <div class ="col-sm-3 ">
                  <h5><strong>Your Review</strong></h5></div>

                 <div class="col-sm-9">
                 <p> 
                {{$already_written->content}}
                </p>
               </div>

                 <button  type="button"  onclick="deletereview({{$already_written->id}})" class ="btn btn-danger rightshift" >Delete Review</button>
                
              @endif
             </div>

             </div>
           </div>

<!--to show resources-->

           <div id ="tab-3">
             <div class ="info">
                <div class ="col-sm-13  thumbnail">
              
                  @foreach($admin_resources as $admin_resource)
                     <a href ="#" class ="col-sm-2 btn btn-success"  role="button" style ="margin-right:15px">  {{$admin_resource->caption}} </a>
                  @endforeach
              
                </div>
                 <hr>
                   
                  <div class = "col-sm-6 thumbnail">     
                  <h4 class = "text-center"><strong>Share your knowledge </strong></h4>
                   <hr>
           
                  <div class = "col-sm-4"> 
                   <h6>
                 {{Form::label('caption','Caption:',['class'=>'floatleft'])}}
                   </h6>
                   </div>
                  
                  <div class = "col-sm-8"> 
                  <p>
                 {{Form::textarea('caption',null,array('id'=>'caption',  'style' => 'width:100%; height: 80px' ))}}
                  </p>
                  </div>
                 
                   <div class ="col-sm-4">
                  <h6>
                 {{Form::label('link_to','Link')}}
                  </h6>
                  </div>
                  
                  <div class ="col-sm-8">

                   <p>  
                  {{ Form::textarea('link_to',null,['id' =>'link_to', 'style' => 'width:100%; height: 80px']) }}
                   </p>
                  </div>

                 <button  type="button" style ="margin-right:15px"  onclick="contribution()" class ="btn btn-primary rightshift" >Submit</button>
                
                  </div>
                 
                <div class ="col-sm-6 ">

                 <div class ="panel panel-default">

                             <h4 class = "text-center"><strong>  User Contribution</strong></h4>
                             <br>
                 
                         <div id ="bijay">
                         <table class ="table table-bordered table-striped">
                              <tbody>

                         @foreach($user_resources as $user_resource)
                                <tr> 
                                <td style="width:45%"><h6><i class="fa fa-user" style="margin-right:2px"></i>{{ link_to("/users/{$user_resource->user_id}",$user_resource->name) }}</h6></td>
                                <td><p><a href={{$user_resource->link}} >{{$user_resource->caption}}</a></p></td>
                                </tr>       
                         @endforeach 

                             </tbody> 
                       </table>
                
                         </div>

                 </div>
                </div>                 
                      </div>
       </div>

</div>
</div>
</div>

{{HTML::script('js/jq.js')}}
{{HTML::script('js/jquery.responsiveTabs.js')}}

<script>

function viewby()
{
        
    alert("abc");

}
function contribution()
{
         var host = "{{URL::to('/')}}";
       
         var caption = $('#caption').val();
         var link = $('#link_to').val();
         var id = {{$subject->id}};


         if(caption == null || caption == "" ||link == null || link =="")
         {
                alert("Some field is missing");
         } 
         else
         {
         $.ajax({
         type: "POST",
         url: host + '/subjects/contribution',
         data: { caption:caption,link:link,id:id},
         success:function(msg){
                 
                 alert(msg);                
                
                 $("#caption").val("");
                 $("#link_to").val("");

          $("#bijay").load(document.URL + ' #bijay');
       
                  }
         });
          }
}
var Difficulty_rating;
var Interest_rating;

$(document).ready(function()
   {
        
       $("#difficulty input:radio").attr("checked", false);
       $('#difficulty input').click(function () {
                    $("#difficulty span").removeClass('checked');
                         $().addClass('checked');
                     });

       $('#difficulty input:radio').change(
                function(){
                            Difficulty_rating  = this.value;
                });    

      $("#interest input:radio").attr("checked", false);
       $('#interest input').click(function () {
                    $("#interest span").removeClass('checked');
                         $().addClass('checked');
                     });

       $('#interest input:radio').change(
                function(){
                        Interest_rating = this.value;
                
                });    

         if(document.URL.indexOf("")==-1)
               {
              url = document.URL+ "";
              location ="";
              location.reload(true);
                }     
     
         // ajax code to refresh the certain section of home page 
        $("#tori").click(function(){
          $("#thapa").load(document.URL + ' #thapa');
        });
      
                   $('#horizontalTab').responsiveTabs({
                
                 });
});

function postreview()
{
          
               var host = "{{URL::to('/')}}";
               var review = $('#name').val();
               var id = {{$subject->id}};

               if(review == null || review == "" )
               {
                         alert("Field is missing");
               }
               else
               {
               $.ajax({
                    type: "POST",
                            url: host + '/subjects',
                            data: {review : review,id:id},
                            success:function(msg){
                                    $("#review").val("");
                                    alert(msg);
                                   
                   $("#thapa").load(document.URL + ' #thapa');
                   $("#already_written").load(document.URL + ' #already_written');
                   
                            }         
                       });
               
                 } 
     

}
 function voting(review_id, vote)
 {
         var host = "{{URL::to('/')}}";
         $.ajax({
         type: "POST",
         url: host + '/subjects/voting',
         data: { review_id:review_id,vote:vote},
         success:function(msg){
        $("#thapa").load(document.URL + ' #thapa');
       
                  }
              });
 
 }

 function rating()
 {
     if( Difficulty_rating == null || Difficulty_rating == "" || Interest_rating == null || Interest_rating =="")
     {
           alert("Some field is missing");
       
     }
    
     else
     {
        var host = "{{URL::to('/')}}";
        var id = {{$subject->id}};

        $.ajax({
             type: "POST",
             url: host + '/subjects/rating',
             data: {diff_rating: Difficulty_rating,int_rating:Interest_rating ,id:id},
             success:function(msg){
                         alert(msg);
                             
                          $("#mathiko").load(document.URL + ' #mathiko');
                          $("#talako").load(document.URL + ' #talako');

                                   }         
                });


     }
    
 }
function deletereview(id)
{
        var host = "{{URL::to('/')}}";
      
        $.ajax({
             type: "POST",
             url: host + '/subjects/deletereview',
             data: {id:id},
             success:function(msg){
                         alert(msg);
                   $("#thapa").load(document.URL + ' #thapa');
                   $("#already_written").load(document.URL + ' #already_written');
                   
                            }         
                });

}
</script>
@stop
