@extends('layouts.default')

@section('title')
        {{ $course->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

   {{HTML::style('css/styles.css')}}

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
            <div class ="col-sm-3"> 
            <div class = "row ">
 
            
   <div id='cssmenu'>
<ul>
            @foreach($terms as $term)
   <li class='has-sub'><a href='#'><span>{{ $term->name}}</span></a>
      <ul>

          @foreach($term['subjects'] as $subject)
         <li><a href='#'><span> {{ link_to("/subjects/{$subject->id}",$subject->name) }}</span></a></li>
          @endforeach
 
      </ul>
   </li>
         @endforeach
</ul>
</div>

          </div>
           </div>
         <div class ="col-sm-1"></div>
           <div class = "col-sm-8 thumbnail">
            <p>Computer engineering </p> 
           </div>
       </div>

{{HTML::script('http://code.jquery.com/jquery-latest.min.js')}}
{{HTML::script('js/script.js')}}


@stop
