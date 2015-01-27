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
{{HTML::script('js/jquery-2.1.0.min.js')}}
{{HTML::script('js/jquery.responsiveTabs.js')}}

<div class ="container"> 
    <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1"><h4>Review</h4></a></li>
            <li><a href="#tab-2"><h4>New Review</h4></a></li>
            <li><a href="#tab-3"><h4>Resources</h4></a></li>
        </ul>

        <div id="tab-1">
            <div class ="info">  Review</div>
        </div>
        <div id="tab-2">
            <div class ="info">  
                 {{Form::open(array('method' =>'post' ,  'id' =>'rv'))}} 
                {{Form::label('name','Text')}}
                {{Form::text('username',null,array('id'=>'name', 'name'=>'name'))}}
                {{Form::submit('submit', array('name'=>'submit'))}}


            </div>
        </div>
        <div id="tab-3">
            <div class ="info">  Resources</div>
        </div>
    </div>


</div>

<script>


$(document).ready(function(){

        $('#rv').on('submit', function(e){
               e.preventDefault();
          
               var host = "{{URL::to('/')}}";
               var name = $('#name').val();

               $.ajax({
                    type: "POST",
                            url: host + '/newreview',
                            data: {name: name},
                            success:function(msg){
                                    $("#rv")[0].reset();
                                    alert(msg);
                            }
               });
 
        }); 

            $('#horizontalTab').responsiveTabs({
          });


});

</script>

@stop
