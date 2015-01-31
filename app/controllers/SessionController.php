<?php

class SessionController extends \BaseController {

	/**
	 * Show the form for creating a new resource.
	 * GET /session/create
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('session.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /session
	 *
	 * @return Response
	 */
	public function store()
	{

            if(Auth::attempt(Input::only('email','password'))){
                
                return Redirect::intended('/');

            }
            
            $errors = new Illuminate\Support\MessageBag;

            $errors->add('login','Email/password combination invalid');
                 
       return Redirect::back()->withInput()->withErrors($errors);

	}

/**
	 * Remove the specified resource from storage.
	 * DELETE /session/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
            Auth::logout();

            return Redirect::to('login')->with('flash_message','You have been logged out.');
	}

}
