@extends('layouts.default')

@section('title')
    Activate your account.
@stop


@section('content')

<div class ="container">

   <div class ="modal-dialog">
         <div class ="form-horizontal">
               
              <div class ="modal-content">
                  
                      <div class ="modal-header">
                              <h3>Email Confirmation !!! </h3>
                        </div>

                        <div class = "modal-body">


                              Please activate your merocourse account by confirming your email address.
                         
                            </div>

                          <div class ="modal-footer">

        {{ Form::open(array('url'=>'register/resend')) }}

            {{ Form::submit('Resend Confirmation',['class' =>'btn btn-primary']) }}

        {{ Form::close() }}


                           </div>
               </div>
         </div>

   </div>

</div>
@stop
