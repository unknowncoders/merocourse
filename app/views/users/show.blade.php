@extends('layouts.default')

@section('title')
        MeroCourse | Home
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

            <div>
                    {{ $user->name }}
            </div>
            <div>
                    {{ $user->age }}
            </div>
            
            <div>
                    {{ $user->about_me }}
            </div>
           <br><br> 
            <div>
                        @foreach($courses as $course)

                            <div>
                                <li> {{ link_to("/courses/{$course->id}",$course->name) }} </li>
                            </div>

                        @endforeach
            </div>
@stop
