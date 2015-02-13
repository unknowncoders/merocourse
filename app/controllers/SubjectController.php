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

}
