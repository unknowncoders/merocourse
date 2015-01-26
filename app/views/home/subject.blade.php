@extends('layouts.subject_default')

@section('subject')

  <div class ="container">
    
    <div class ="jumbotron">
         <h3>Subject</h3>
        <hr>
       
       <div class ="row">     
          
       @foreach($faculty as $subject)
           
        <div class = "col-sm-2">
           <a href="{{URL::to('review',['subjectid'=>$subject->id])}}"  class ="thumbnail">
                       
           {{$subject->subject_name}}
                       
           </a> 
       </div>
     
      @endforeach
    
       </div>
   </div>

 </div>
 

@stop
