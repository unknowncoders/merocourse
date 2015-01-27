@extends('layouts.default')

@section('title')

   Merocourse | review
@stop

 @section('header') 

  @include('resources/subject_header')
 
  @stop


@section('content')

  {{HTML::style('css/responsive-tabs.css')}}
  {{HTML::style('css/style.css')}}

<div class ="container">

         <div class ="thumbnail">
          <h3>Welcome {{$user->name}} ! </h3>
        </div>    
 
          <div id="horizontalTab">
        <ul>
            <li><a href="#tab-1"><h4>Review</h4></a></li>
            <li><a href="#tab-2"><h4>New Review</h4></a></li>
            <li><a href="#tab-3"><h4>Resources</h4></a></li>
        </ul>

        <div id="tab-1">
               <p>This is Review page</p>
            </div>
        <div id="tab-2">
                 <p>This is New Review page </p>
          </div>
        <div id="tab-3">
                 <p> This is Resources page </p> 
       </div>
    </div>



         <p class ="info"></div>
</div>
  
  {{HTML::script('js/jquery-2.1.0.min.js')}}
  {{HTML::script('js/jquery.responsiveTabs.js')}}


    <script type="text/javascript">
        $(document).ready(function () {
            $('#horizontalTab').responsiveTabs({
          });

        

        });
    </script>
            
            @stop
