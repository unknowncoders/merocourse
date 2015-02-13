<?php

class AdminUsersController extends \BaseController {

        protected $user;

    public function __construct(User $user){
            $this->user = $user;
    }

	/**
	 * Display a listing of the resource.
	 * GET /adminusers
	 *
	 * @return Response
	 */
	public function index()
	{
            $users = $this->user->all();

            return View::make('admin.users.index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /adminusers/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /adminusers
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /adminusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /adminusers/{id}/edit
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
	 * PUT /adminusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /adminusers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(User $user)
	{
             if($user->isCurrentUser()){
                return Redirect::to('admin/users')->with('flash_messsage','Task failed.');
             }

            if($user->isAdmin()){
                    $user->admin->delete();
            } 

             $user->delete();
            return Redirect::to('admin/users')->with('flash_message','Success!');
	}

    public function toggleAdmin(User $user){
            if($user->isCurrentUser()){
                return Redirect::to('admin/users')->with('flash_messsage','Task failed.');
            }

            if($user->isAdmin()){
                    $user->admin->delete();
            }else{
                    $admin = new Admin;
                    $admin->user_id = $user->id;
                    $admin->save();
            }
            return Redirect::to('admin/users')->with('flash_message','Success!');
    }

}
