<?php

class CourseController extends \BaseController {

        protected $course;

        public function __construct(Course $course){

                    $this->course = $course;
        }


	/**
	 * Display a listing of the resource.
	 * GET /course
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /course/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Course $course)
	{

            $course['period'] = $course->durationToStr();
            
            $terms = $course->terms()->get();
            
            $auth_user = Auth::user();
            
                foreach($terms as $term){
                      
                $courseterm = CourseTerm::where('course_id','=',$course->id)->where('term_id','=',$term->id)->first();

                $term['subjects'] = $courseterm->subjects()->get();
            }

            return View::make('courses.show',compact(['course','terms','auth_user']));
	}

}
