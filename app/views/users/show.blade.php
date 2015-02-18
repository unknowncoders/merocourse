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
            <div id="courseFollow">
                        Courses Following

                        @foreach($courses as $course)

                            <div>
                                <li> {{ link_to("/courses/{$course->id}",$course->name) }} </li>
                                <button   type="button" onclick= "unfollow({{$course->id}})" >Unfollow</button>
                            </div>

                        @endforeach

                        All courses

                        @foreach($filteredCourses as $filteredCourse)

                            <div>
                                <li> {{ link_to("/courses/{$filteredCourse->id}",$filteredCourse->name) }} </li>
                                <button   type="button" onclick= "follow({{$filteredCourse->id}})" >Follow</button>
                            </div>

                        @endforeach


            </div>

            <div>
                    User Contributed Reviews

                    <br>

                    <?php $indexCnt = 0; ?>

                    @foreach($reviews as $review)

                       <b>{{ $subjectStr[$indexCnt] }} </b>
                    <br>
                          {{ $review->content }}

                    @endforeach


            </div>

<script>

            function unfollow(course_id){
                    var host = "{{URL::to('/')}}";
                    $.ajax({
                    type: "POST",
                    url: host + '/users/unfollow',
                    data: { course_id:course_id},
                    success:function(msg){
                    $("#courseFollow").load(document.URL + ' #courseFollow');
       
                  }
              });
 

            }
            
            function follow(course_id){
                    var host = "{{URL::to('/')}}";
                    $.ajax({
                    type: "POST",
                    url: host + '/users/follow',
                    data: { course_id:course_id},
                    success:function(msg){
                    $("#courseFollow").load(document.URL + ' #courseFollow');
       
                  }
              });
 
            }

</script>
@stop
