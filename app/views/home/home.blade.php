 @extends('layouts.default')

@section('title')

   Merocourse
@stop

 @section('header') 

  @include('resources/home_header')
 @stop

  @section('content')


         <div class ="container">
          <h3><strong>Welcome {{$user->name}} !</strong> </h3>
         @foreach($faculty as $fac)
             
                 <br><br><br><br>                
                <h3>{{$fac->faculty_name}}</h3>
             
                   <br>
                <div class = "row">
                      
                   @if($fac->faculty_name == 'Architecture Engineering')
                             

                        @foreach($semester as $sem)
                        
             
                         <div class = "col-sm-2">
                    
                          
                      <a href="{{URL::to('subject',['facultyid'=>$fac->faculty_name, 'semesterid' => $sem->semester_name])}}"  class ="thumbnail">
                       
                            {{$sem->semester_name}}
                       
                    </a> 
                     </div>
                        
                         @endforeach

                 @else
                        @foreach($semester1 as $sem)
               
                       <div class = "col-sm-2">
                  
                      <a href="{{URL::to('subject',['facultyid'=>$fac->faculty_name, 'semesterid' => $sem->semester_name])}}"  class ="thumbnail">
                    
                       {{$sem ->semester_name}}
                    </a> 
                     </div>

                        @endforeach
                  
                  @endif
               </div>

          
           @endforeach
    </div>
     
  @stop
