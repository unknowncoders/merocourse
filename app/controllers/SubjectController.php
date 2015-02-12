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

            $subject['drCnt'] = $subject->difficultyRatings()->count();
            $subject['irCnt'] = $subject->interestRatings()->count();

            return View::make('subjects.show',compact(['subject','reviews']));
	}

}
