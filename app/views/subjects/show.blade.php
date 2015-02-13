@extends('layouts.default')

@section('title')
        {{ $subject->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

<div> Subject name: {{$subject->name}}</div>
<div> Difficulty Rating: {{ $subject->difficulty_rating }} </div>
<div> Interest Rating: {{ $subject->interest_rating }} </div>
<div> Full Marks: {{ $subject->fullMarks }} </div>

<div> 
        @foreach($reviews as $review)
                
            <div> 
                <li> {{ link_to("/users/{$review->user->id}",$review->user->name) }} </li>
            </div>

            <div>
                {{ $review->content }}
            </div>

        @endforeach

</div>

@stop
