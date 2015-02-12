@extends('layouts.default')

@section('title')
        {{ $subject->name }}
@stop

@section('header')
    @include('resources.home_header')
@stop

@section('content')

<div> Difficulty Rating: {{ $subject->difficulty_rating }} (Rated by {{ $subject['drCnt'] }} users)  </div>
<div> Interest Rating: {{ $subject->interest_rating }} (Rated by {{ $subject['irCnt'] }} users)  </div>
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
