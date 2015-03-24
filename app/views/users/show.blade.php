@extends('layouts.default')
@section('title')
MeroCourse | Home
@stop
@section('header')
@include('resources.home_header')
@stop
@section('content')

{{HTML::style('css/styles.css')}}

<div class = "container">
<div class ="col-sm-13 ">
<div>
<h3> {{ $user->name }} </h3>
</div>
<div>
<h4> {{ $user->age }}&nbsp; years old </h4>
</div>
<div>
<h4> {{ $user->about_me }} </h4>
</div>
</div>
<br><br><br>
<div id="courseFollow">
<div class = "col-sm-6 ">
<h4> <strong> Courses Following</strong> </h4>
<hr>
@foreach($courses as $course)
<div>
<div class ="col-sm-8 ">
<h5> {{ link_to("/courses/{$course->id}",$course->name) }} </h5>
</div>
<div class ="col-sm-4 ">
<h6><button type="button" onclick= "unfollow({{$course->id}})" ><i class="fa fa-minus-square"></i>&nbsp;Unfollow</button> </h6>
</div>
</div>
@endforeach
</div>
<div class = "col-sm-6 ">
<h4> <strong> All courses</strong> </h4>
<hr>
@foreach($filteredCourses as $filteredCourse)
<div>
<div class ="col-sm-8 ">
<h5> {{ link_to("/courses/{$filteredCourse->id}",$filteredCourse->name) }} </h5>
</div>
<div class ="col-sm-4 ">
<h6><button type="button" onclick= "follow({{$filteredCourse->id}})" ><i class="fa fa-plus-square"></i>&nbsp;Follow</button></h6>
</div>
</div>
@endforeach
</div>
</div>
<div class ="col-sm-12 ">
<br><br><br>
<h4><strong> User Contributed Reviews</strong></h4>
<hr>
<?php $indexCnt = 0; ?>

   <div id='cssmenu'>
<ul class="ul">
            @foreach($course_reviews as $course_review)
   <li ><a  href='#'><span class="span"><h5><strong>{{ $courseStr[$indexCnt] }}</strong></h5></span></a>
      <ul class="ul">

<br><p> {{ $course_review->content }} </p >
    

      </ul>
   </li>


<?php $indexCnt++; ?>
<br>
         @endforeach
</ul>
</div>

<?php $indexCnt = 0; ?>

   <div id='cssmenu'>
<ul class="ul">
            @foreach($reviews as $review)
   <li ><a  href='#' ><span class="span"><h5><strong>{{ $subjectStr[$indexCnt] }}</strong></h5></span></a>
      <ul class="ul">

<br><p> {{ $review->content }} </p >
    

      </ul>
   </li>

<?php $indexCnt++; ?>
<br>
         @endforeach
</ul>
</div>



</div>
</div>

{{HTML::script('js/script.js')}}


<script>
$("#show1").click(function(){
        $("#item").toggle();
        $("#button1").toggle();
        $("#button2").toggle();
});
$("#show2").click(function(){
        $("#item").toggle();
        $("#button1").toggle();
        $("#button2").toggle();
});
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
