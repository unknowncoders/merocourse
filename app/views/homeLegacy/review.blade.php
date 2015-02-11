@extends('layouts.default') 
@section('title')

   Merocourse | Review
@stop

 @section('header') 

  @include('resources/subject_header')
 @stop



@section('content')

{{HTML::script('js/jq.js')}}
{{HTML::style('css/responsive-tabs.css')}}
{{HTML::style('css/style.css')}}
{{HTML::script('js/jquery.responsiveTabs.js')}}
{{HTML::style('css/review.css')}}

<div class ="container"> 
 
           <h3> <strong>Welcome {{$user->name}} !</strong> </h3>
            
          <br/ ><br/><hr><br/>
          <h3>{{$subjectname->subject_name}} </h3>
<br><br>    
<div id="horizontalTab">
        <ul>
            <li><a href="#tab-1"><h4>Review</h4></a></li>
            <li><a href="#tab-2"><h4>New Review</h4></a></li>
            <li><a href="#tab-3"><h4>Resources</h4></a></li>
        </ul>
            <div id="tab-1">
            <div class ="info">
                  <div id ="thapa"> 
                      @for($i = 0; $i< sizeof($username); $i++) 
         <div class ="col-sm-13 thumbnail">          
                  <div class ="col-sm-3 ">
                     <h4> <i class="fa fa-user fa-2x"></i> {{  $username[$i]->name}}</h4>
                     </div>
                     <div class ="col-sm-9 ">
                           {{$review[$i]->content}}
                      </div>         
                     <?php $j = 0; ?>
                                  @foreach($urs as $ar)
                            
                               @if($ar->review_id == $review[$i]->id)
                                   
                               @if($ar->status == 1) 

                                        <?php $j = 1; ?>
                     <div class ="col-sm-12 " style ="text-align:right">
                       {{$review[$i]->up}}
                   <button   type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})"><i class="fa fa-thumbs-up"></i></button>
                      {{$review[$i]->down}}
                   <button  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})"><i class="fa fa-thumbs-o-down"></i></button>
                     </div>                   
                                    @elseif($ar->status == 0)
                                       <?php $j = 1; ?> 
                     <div class ="col-sm-12 " style ="text-align:right">
                       {{$review[$i]->up}}
                   <button   type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})"><i class="fa fa-thumbs-o-up"></i></button>
                      {{$review[$i]->down}}
                   <button  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})"><i class="fa fa-thumbs-down"></i></button>
                           </div>            
                                     @endif
                                   
                                     @endif
                                   
                                     @endforeach 
                             @if($j == 0)
                     <div class ="col-sm-12 " style ="text-align:right">
                            {{$review[$i]->up}}
                   <button   id = "up"  type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})"><i class="fa fa-thumbs-o-up"></i></button>
                      {{$review[$i]->down}}
                   <button id ="down"  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})"><i class="fa fa-thumbs-o-down"></i></button>
                        </div>
                    @endif    
                   
                      </div>

 <br/><br/><hr><br/><br/>
                 @endfor    
                     
                 </div>
              </div>
        </div>
        <div id="tab-2">
            <div class ="info">  
            <div class  = "col-sm-2"> 
             {{Form::open(array('method' =>'post' ,  'id' =>'rv'))}} 
             <h5>   {{Form::label('name','Your Review')}}</h5></div>
               <div class ="col-sm-10 ">
              <p> {{Form::textarea('username',null,array('id'=>'name', 'name'=>'name', 'style' => 'width:100%; height: 350px','placeholder' =>'You can also use html tags such as <h4>, <br>' ))}}
                </p>      
         <hr>     </div>
                
        <h5> <div class ="col-sm-2"  > {{Form::label('rate','Difficulty rating: ')}}</div>
                 </h5>
                  <div class ="col-sm-9 ">

          <div  class="score ">
  
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
                     {{Form::submit('Submit', array('name'=>'submit' , 'id' => 'tori','class' => 'btn btn-primary'))}}

            </div>
        </div>
        <div id="tab-3">
            <div class ="info" > 
                   <p>Resources</p>           
    
              </div>
        </div>
    </div>


</div>

<script>
 

var userRating;

$(document).ready(function(){
      


      $(".rating input:radio").attr("checked", false);
       $('.rating input').click(function () {
                    $(".rating span").removeClass('checked');
                         $(this).parent().addClass('checked');
                     });

       $('input:radio').change(
                function(){
                              userRating = this.value;
                              });    
    if(document.URL.indexOf("")==-1)
    {
              url = document.URL+ "";
              location ="";
              location.reload(true);
    }     
        $("#tori").click(function(){
            
           // ajax code to refresh the certain section of home page 
              
               
          $("#thapa").load(document.URL + ' #thapa');
                  

        });
        $('#rv').on('submit', function(e){
               e.preventDefault();
          
               var host = "{{URL::to('/')}}";
               var name = $('#name').val();
               var rate = userRating;
                 
               if(name == null || name == "" || rate == null || rate == " ")
               {
                         alert("Some field is missing");
               }
               else
               {
               $.ajax({
                    type: "POST",
                            url: host + '/newreview/{{ $subjectname->subject_name}}',
                            data: {name: name, rate: rate},
                            success:function(msg){
                                    $("#rv")[0].reset();
                                    alert(msg);
                             
                    $(".rating span").removeClass('checked');
                       $("#thapa").load(document.URL + ' #thapa');
                       
                            }
               });
              
              } 
     
                }); 

            $('#horizontalTab').responsiveTabs({
          });


});

    function dolike(id,name,sid)
        {
                var host = "{{URL::to('/')}}";
               $.ajax({
                    type: "POST",
                            url: host + '/like/'+id,
                            data: {name:name,sid:sid},
                            success:function(msg){
                             
                       $("#thapa").load(document.URL + ' #thapa');
                       
                            }
               });
 
        }
</script>

@stop
