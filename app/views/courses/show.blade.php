@extends('layouts.default')

@section('title')
        {{ $course->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

            <div>
                    {{ $course->name }}
            </div>
            <div>
                    Duration: 
                    {{ $course->period }}
            </div>
           <br><br> 
            <div>
                        @foreach($terms as $term)

                            <div>
                                {{ $term->name}}
                            </div>

                            <div>
                                @foreach($term['subjects'] as $subject)
                                    <li> {{ link_to("/subjects/{$subject->id}",$subject->name) }} </li>
                                @endforeach

                            </div>

                        @endforeach
            </div>
@stop
