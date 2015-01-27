@extends('layouts.default')


@section('title')

   Merocourse | subject
@stop

 @section('header') 

  @include('resources/subject_header')
 @stop



@section('content')

  <div class ="container">
 
         <div class ="thumbnail">
          <h3>Welcome {{$user->name}} ! </h3>
        </div>    
            
          <br/><br/> 
         <h3>Subject</h3>
        <hr>
       
       <div class ="row">     
          
       @foreach($faculty as $subject)
           
        <div class = "col-sm-2">
           <a href="{{URL::to('review',['subjectname'=>$subject->subject_name])}}"  class ="thumbnail">
                       
           {{$subject->subject_name}}
                       
           </a> 
       </div>
     
      @endforeach
    
       </div>
   </div>

 

@stop
