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


<div class ="container"> 
 
         <div class ="thumbnail">
          <h3>Welcome {{$user->name}} ! </h3>
        </div>    
            
          <br/>
          <h3>{{$subjectname->subject_name}} </h3>
           <hr>
    <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1"><h4>Review</h4></a></li>
            <li><a href="#tab-2"><h4>New Review</h4></a></li>
            <li><a href="#tab-3"><h4>Resources</h4></a></li>
        </ul>
            <div id="tab-1">
            <div class ="info">
                  <div id ="thapa"> 
                    @for($i = 0; $i < sizeof($username); $i++)
                     
                       {{$username[$i]->name}}
                      {{$review[$i]->content}}
                       {{$review[$i]->up}}
                      {{$review[$i]->down}}
                        <br> 

                              <?php $j = 0; ?>

                                  @foreach($urs as $ar)
                            
                               @if($ar->review_id == $review[$i]->id)
                                   
                               @if($ar->status == 1) 

                                        <?php $j = 1; ?>
                   <button   type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})">AUp</button>
                   <button  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})">down</button>
                                        
                                    @elseif($ar->status == 0)
                                       <?php $j = 1; ?> 
                   <button   type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})">Up</button>
                   <button  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})">Adown</button>
                                       
                                     @endif
                                   
                                     @endif
                                   
                                     @endforeach 
                             @if($j == 0)
                   <button   id = "up"  type="button" onclick="dolike({{$review[$i]->id}},1,{{$subjectname->id}})">Up</button>
                   <button id ="down"  type="button" onclick="dolike({{$review[$i]->id}},0,{{$subjectname->id}})">down</button>
                                @endif
      <br>
                 @endfor    
                     
                 </div>
              </div>
        </div>
        <div id="tab-2">
            <div class ="info">  
                 {{Form::open(array('method' =>'post' ,  'id' =>'rv'))}} 
                {{Form::label('name','Text')}}
                {{Form::text('username',null,array('id'=>'name', 'name'=>'name'))}}
                  <br>
                 {{Form::label('rate','Rate')}}
                {{Form::text('rate',null,array('id'=>'rate', 'name'=>'rate'))}}
                   <br>
               {{Form::submit('submit', array('name'=>'submit' , 'id' => 'tori'))}}


            </div>
        </div>
        <div id="tab-3">
            <div class ="info">  Resources</div>
        </div>
    </div>


</div>

<script>
      
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
$(document).ready(function(){

        
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
               var rate = $('#rate').val();
               $.ajax({
                    type: "POST",
                            url: host + '/newreview/{{ $subjectname->subject_name}}',
                            data: {name: name, rate: rate},
                            success:function(msg){
                                    $("#rv")[0].reset();
                                    alert(msg);
                             
                       $("#thapa").load(document.URL + ' #thapa');
                       
                            }
               });
 
        }); 

            $('#horizontalTab').responsiveTabs({
          });


});

</script>

@stop
