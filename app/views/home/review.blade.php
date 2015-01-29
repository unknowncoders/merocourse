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
            <div class  = "col-sm-2"> 
             {{Form::open(array('method' =>'post' ,  'id' =>'rv'))}} 
             <h6>   {{Form::label('name','Your Review')}}</h6></div>
               <div class ="col-sm-10 thumbnail">
              <p> {{Form::textarea('username',null,array('id'=>'name', 'name'=>'name', 'style' => 'width:100%; height: 350px','placeholder' =>'You can also use html tags such as <h4>, <br>' ))}}
                </p>      
              </div>
                
        <h6> <div class ="col-sm-2"  > {{Form::label('rate','Difficulty rating: ')}}</div>
                 </h6>
                  <div class ="col-sm-9 ">
<div class="rating">
    <span><input type="radio" name="rating" id="str5" value="5"><label for="str5"></label></span>
    <span><input type="radio" name="rating" id="str4" value="4"><label for="str4"></label></span>
    <span><input type="radio" name="rating" id="str3" value="3"><label for="str3"></label></span>
    <span><input type="radio" name="rating" id="str2" value="2"><label for="str2"></label></span>
    <span><input type="radio" name="rating" id="str1" value="1"><label for="str1"></label></span>
                </div> </div>
                                {{Form::submit('Submit', array('name'=>'submit' , 'id' => 'tori','class' => 'btn btn-primary'))}}

            </div>
        </div>
        <div id="tab-3">
            <div class ="info">  Resources</div>
        </div>
    </div>


</div>

<script>
 

var userRation;

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
