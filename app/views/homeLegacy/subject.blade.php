@extends('layouts.default')


@section('title')

   Merocourse | subject
@stop

 @section('header') 

  @include('resources/subject_header')
 @stop



@section('content')

  <div class ="container">
 
          <h3><strong>Welcome {{$user->name}} !</strong> </h3>
            
          <br/><br/></br> 
         <h3>Subject</h3>
     <br>   <hr></br>
       
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
