<?php

class SubjectController extends \BaseController {

        protected $subject;

        public function __construct(Subject $subject){

                    $this->subject = $subject;
        }


	/**
	 * Display a listing of the resource.
	 * GET /subject
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /subject/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Subject $subject)
	{
            $reviews = $subject->reviews()->get();

            $auth_user = Auth::user();

            return View::make('subjects.show',compact(['subject','reviews','auth_user']));
    }
   
    public function store()
    {

            $subjectid = Input::get('id');
            $user = Auth::user();
            $review = Input::get('review');
            $diff_rate = Input::get('diff_rate');
            $int_rate = Input::get('int_rate');

             return $review;
    } 

}
