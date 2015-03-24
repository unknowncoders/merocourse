@extends('layouts.default')

@section('title')
        {{ $course->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

{{HTML::style('css/styles.css')}}
{{HTML::style('css/style.css')}}
{{HTML::style('css/responsive-tabs.css')}}
{{HTML::style('css/review.css')}}


       <div class ="container">

         <div class = "col-sm-13 "> 
            <div>
                 <h3>   {{ $course->name }} </h3>
            </div>
            <div>
                  <h4>  Duration: {{ $course->period }} </h4>
            </div>
        </div>
           <br><br> 
            <div class ="col-sm-2"> 
            <div class = "row ">


   <div id='cssmenu'>
<ul class="ul">
            @foreach($terms as $term)
   <li class='has-sub li'><a class="aa" href='#'><span class="span"><h5>{{ $term->name}}</h5></span></a>
      <ul class="ul">

          @foreach($term['subjects'] as $subject)
         <li class="li"><a class="aa" href='#'><span class="span"><h6> {{ link_to("/subjects/{$subject->id}",$subject->name) }}</h6></span></a></li>
          @endforeach

      </ul>
   </li>
         @endforeach
</ul>
</div>

          </div>
           </div>
           <div class = "col-sm-10 ">

<div class = "col-sm-13 thumbnail"> 

<div id = "horizontalTab">
        <ul>
           <li><a href="#tab-1"><h4>Review</h4></a></li>
           <li><a href="#tab-2"><h4> Your Thoughts</h4></a></li>
           </ul>
             <div id="tab-1">
            <div class ="info"> 
        <div id ="thapa"> 

         @foreach($reviews as $review)

                <div class ="col-sm-3 "> 
                  <h4><i class="fa fa-user fa-2x" style="margin-right:10px"></i>{{ link_to("/users/{$review->user->id}",$review->user->name) }}</h4> 
                </div>

                 <div class = "col-sm-9  " >
                    <br>
                       {{ $review->content }}
                    <br>
                </div>

           @endforeach

            </div>
           
            </div>
            </div>  

            <div id="tab-2">
            <div class ="info"> 


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
    </div>
   </div>

    </div>
       </div>

{{HTML::script('js/jq.js')}}
{{HTML::script('js/jquery.responsiveTabs.js')}}

{{HTML::script('js/script.js')}}

<script>
$(document).ready(function()
{
        if(document.URL.indexOf("")==-1)
        {
                url = document.URL+ "";
                location ="";
                location.reload(true);
        }     

        $('#horizontalTab').responsiveTabs({
        });

}); 

function postreview()
{

        var host = "{{URL::to('/')}}";
        var review = $('#name').val();
        var id = {{$course->id}};

        if(review == null || review == "" )
        {
                alert("Field is missing");
        }
        else
        {
                $.ajax({
                        type: "POST",
                                url: host + '/courses',
                                data: {review : review,id:id},
                                success:function(msg){
                                        $("#name").val("");
                                        alert(msg);

                                             $("#thapa").load(document.URL + ' #thapa');
                                             $("#already_written").load(document.URL + ' #already_written');

                                }         
                });

        } 

}

 
function deletereview(id)
{
        var host = "{{URL::to('/')}}";
      
        $.ajax({
             type: "POST",
             url: host + '/courses/deletereview',
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
