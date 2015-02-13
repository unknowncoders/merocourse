@extends('layouts.default')

@section('title')
    User Management
@stop

@section('header')

@stop

@section('content')

            <style>   .theader{ width:200px; } </style>


    <table id="users">
        <thead>
                <tr>
                    <th class="theader"> Name </th>
                    <th class="theader"> Email </th>
                    <th class="theader"> Activated </th>
                    <th class="theader"> Created At </th>
                    <th class="theader"> Actions </th>

                </tr>

        </thead>

        <tbody>
            @foreach($users as $user)

                 <tr>
                    <th class="theader"> {{{ $user->name }}} </th>
                    <th class="theader"> {{{ $user->email }}} </th>
                    <th class="theader">  @if($user->confirmed){{ 'Yes' }} @else {{ 'No' }} @endif </th>
                    <th class="theader"> {{{ $user->created_at }}} </th>
                    <th class="theader"> 
                        
                        @if(!$user->isCurrentUser())
                                {{ Form::open(['url'=>'admin/users/'.$user->id,'method'=>'Delete']) }}
                                    
                                    {{ Form::submit('Delete') }}

                                {{ Form::close() }}                                        

                                 {{ Form::open(['url'=>'admin/users/'.$user->id.'/toggleAdmin']) }}

                                        @if($user->isAdmin()){{ Form::submit('Remove from admins') }}
                                        @else {{ Form::submit('Add to admins') }}
                                        @endif

                                {{ Form::close() }}                                        



                        @endif

                    </th>

                </tr>

            @endforeach

        </tbody>

    </table>


@stop


