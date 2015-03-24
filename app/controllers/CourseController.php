<?php

class CourseController extends \BaseController {

        protected $course;

        public function __construct(Course $course, Coursereview $course_review, Coursevote $course_vote ){

                $this->course = $course;
                $this->course_review = $course_review;
                $this->course_vote = $course_vote;
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

            //to check the written tab at your thought tab
            $already_written = Coursereview::where('user_id', Auth::user()->id)->where('course_id',$course->id)->first();
            

            //to get the review of course
              
            $reviews = $course->coursereviews()->paginate(1);
          
             //to get the total up and down of the reviews

                foreach($reviews as $review)
                {
                        $vote = Coursevote::where('user_id',$auth_user->id)->where('course_id', $review->id)->first();
                     
                        if(empty($vote))
                        {
                                $review['usr_vote'] = -1;
                        }
                        else
                        {
                                $review['usr_vote']= $vote->vote;
                        }
                }

            return View::make('courses.show',compact(['course','reviews','already_written','terms','auth_user']));
	}

    public function store()
    {
        
            $courseid = Input::get('id');
            $user = Auth::user();
            $review = Input::get('review');

            $this->course_review->user_id= $user->id;
            $this->course_review->course_id= $courseid;
            $this->course_review->content = $review;

            $this->course_review->save();

            return "Your reviews has posted";
    }

    public function deletereview()
    {
              $id = Input::get('id');
  
              Coursereview::find(Input::get('id'))->delete();

             // Vote::where('review_id',$id)->delete(); 
              
              return "Your Review is successfully deleted"; 
    }
}
