@extends('layouts.login_default')

@section('content')

  
<div class ="container">

      <div class ="modal-dialog">
         <div class ="form-horizontal">
             
        {{ Form::open(array('route'=>'session.store')) }}
                    
                    <div class ="modal-content">

                            <div class ="modal-header">
                                
                                  <h3>Login</h3>

                            </div>

                            <div class ="modal-body">

                                    <div class ="form-group">
                                       <div class ="col-sm-2 control-label ">
                                              {{ Form::label('email','Email: ',['class' =>'floatleft']) }}
                                        </div>

                                        <div class ="col-sm-8">
                                          
                                           {{ Form::text('email',null,['class'=>'form-control']) }}
                                         
                                          </div>
                                    </div>

                                     <div class ="form-group">
                                       <div class ="col-sm-2 control-label">
                                             {{ Form::label('password', 'Password: ',['class' =>'floatleft']) }}
                                           
                                        </div>

                                        <div class ="col-sm-8">
                                          
                                            {{ Form::password('password',['class'=>'form-control']) }}

                                                <p>
                                                {{ $errors->first ('login' , '<span class= errormessage>:message</span>')}}
                                                </p>
                
                                         </div>


                                    </div>
                            </div> 

                            <div class ="modal-footer">

                                 {{ Form::submit('Login',['class' => 'btn btn-primary']) }}

                            </div>
                    </div>             
                 {{ Form::close() }}

         </div>


      </div>
</div>

@stop
