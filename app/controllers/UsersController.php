<?php

class UsersController extends \BaseController {

        protected $user;

        public function __construct(User $user){

        /*
         * Tried this to avoid having to partition in the routes file. 
         * But, it didn't work out. 
         * Retained for future use (?)
         
            $this->beforeFilter('guest',['only'=>['create','store']]);
            $this->beforeFilter('auth',['except'=>['create','store']]);
            $this->beforeFilter('guest',['only'=>['create','store']]);
        */

            $this->user = $user;
        }

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
            $users = User::all();

            return $users;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
            $input = Input::except('month','year','day');
            $birthday = Input::get('year')."-".Input::get('month')."-".Input::get('day');
            $this->user->date_of_birth = $birthday;

            if(! $this->user->fill($input)->isValid())
            {

                return Redirect::back()->withInput()->withErrors($this->user->errors); 

            }

            unset($this->user->password_confirmation);
            $this->user->password = Hash::make($this->user->password);

            $confirmation_code = str_random(30);
            $this->user->confirmation_code = $confirmation_code;

            //Perhaps, wait for some time before sending?

            Mail::send('emails.confirm',array('confirmation_code'=>$confirmation_code),function($message){
                $message->to($this->user->email,$this->user->name)->subject('Activate your account.');
            });


            $this->user->save();

            Auth::attempt(["email"=>$this->user->email,"password"=>Input::get('password')]);

            return Redirect::to('/')->with('flash_message','You have been successfully registered.');
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(User $user)
	{
            // Calculate age of user
            $user['age'] = $user->getAge();
             
            $auth_user = Auth::user();
            $courses = $user->courses()->orderBy('name','ASC')->get();

            $allCourses = Course::all();

            $filteredCourses = $allCourses->filter(function($courseInst){

                    $courseUsers = $courseInst->users()->get();
                
                    foreach($courseUsers as $courseUser){
                            if($courseUser->id == Auth::user()->id){
                                    return false;
                            }
                    }

                    return true;
            
            });

            $reviews = $user->reviews()->orderBy('created_at','DESC')->get();
            
            $course_reviews = $user->course_reviews()->orderBy('created_at','DESC')->get();
 
            foreach($reviews as $review){
                    $subjectStr[] = $review->subject->name;
                      
            }

            foreach($course_reviews as $course_review){
                    $courseStr[] = $course_review->course->name;
            
            }

            return View::make('users.show',compact(['user','course_reviews','courses','auth_user','filteredCourses','reviews','subjectStr','courseStr']));

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

    public function confirm($confirmation_code)
    {
            if(! $confirmation_code)
            {
                return Redirect::to('login')->with('flash_message','Error encountered during activation. Try again');
            }

            $user = User::whereConfirmationCode($confirmation_code)->first();

            if( ! $user)
            {
                return Redirect::to('login')->with('flash_message','Error encountered during activation. Try again');
            }

            $user->confirmed = 1;
            $user->confirmation_code = null;
            $user->save();


            return Redirect::to('login')->with('flash_message','Your account has been activated!');
    }

    public function getResend()
    {
            return View::make('activate');
    }

    public function postResend()
    {

             Mail::send('emails.confirm',array('confirmation_code'=>Auth::user()->confirmation_code),function($message){
                $message->to(Auth::user()->email,Auth::user()->name)->subject('Activate your account.');
             });

             return View::make('activate')->with('flash_message','An email has been sent to you again. Please use it to complete the registration process');
    }

    public function unfollow()
    {
            $courseId = Input::get('course_id');

            $course = Course::where('id','=',$courseId)->first();

            $course->users()->detach(Auth::user()->id);


    }
    
    public function follow()
    {
            $courseId = Input::get('course_id');

            $course = Course::where('id','=',$courseId)->first();

            $course->users()->attach(Auth::user()->id);

    }
}
