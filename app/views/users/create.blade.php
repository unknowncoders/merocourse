@extends('layouts.register_default')

@section('content')

<div class ="container">

    <div class ="modal-dialog">

         <div class ="form-horizontal">
         
        {{ Form::open(array('route'=>'users.store')) }}
            
                   <div class="modal-content">
                     
                     <div class ="modal-header">
                        <h3>Sign Up</h3>
                     </div>
                      
                      <div class ="modal-body">

                          <div class ="form-group">
                            <div class ="col-sm-3 control-label">
                                  
                                   {{ Form::label('name','Name: ',['class' =>'floatleft']) }}
                                           
                                </div>

                               <div class ="col-sm-8">
                                {{ Form::text('name',null,['class'=>'form-control']) }}

                                   <p>
                                {{ $errors->first ('name' , '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                                  
                               

                         </div>
                         
                             <div class ="form-group">
                            <div class ="col-sm-3 control-label">
                              {{ Form::label('email', 'Email: ',['class' =>'floatleft']) }}
                                           
                                </div>

                               <div class ="col-sm-8">
                                {{ Form::email('email',null,['class'=>'form-control']) }}

                                <p>
                                {{ $errors->first ('email' , '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                         </div>
                         

                           <div class ="form-group">
                            <div class ="col-sm-3 control-label">
                              {{ Form::label('password', 'Password: ',['class' =>'floatleft']) }}
                                           
                                </div>

                               <div class ="col-sm-8">
                                {{ Form::password('password',['class'=>'form-control']) }}

                                <p>
                                {{ $errors->first ('password' , '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                         </div>
                           
                              <div class ="form-group">
                            <div class ="col-sm-3 control-label  ">
                          
                                 {{ Form::label('password_confirmation', 'Verify Password: ',['class' =>'floatleft']) }}

                                </div>

                               <div class ="col-sm-8">
                                {{ Form::password('password_confirmation',['class'=>'form-control']) }}

                                <p>
                                {{ $errors->first ('password_confirmation' , '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                         </div>
                          
                           <div class ="form-group">
                            <div class ="col-sm-3 control-label">
                                           
                                         {{ Form::label('dateOfBirth','Date of birth: ',['class' =>'floatleft']) }}
                                </div>

                               <div class ="col-sm-8">

                               {{ Form::selectMonth('month',['class'=>'form-control']) }}
                               {{ Form::selectRange('day',1,31,['class'=>'form-control']) }}
                               {{ Form::selectRange('year',2015,1905) }}


                                <p>
                                {{ $errors->first (' dateOfBirth', '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                         </div>
                           
                              <div class ="form-group">
                            <div class ="col-sm-3 control-label">
                          
                                        {{ Form::label('gender','Gender: ',['class' =>'floatleft']) }}
                    
                             </div>

                               <div class ="col-sm-8">

                             {{ Form::select('gender',array('m'=>'Male','f'=>'Female'),['class'=>'form-control']) }}
                                <p>
                                {{ $errors->first ('gender' , '<span class= errormessage>:message</span>')}}
                                </p>

                               </div>
                         </div>
                          

                      </div>

                        <div class ="modal-footer">

                                 {{ Form::submit('Sign Up',['class' => 'btn btn-primary']) }}

                            </div>

                   </div>
             {{ Form::close() }}
                  

         </div>

    </div>

</div>            

@stop
