<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

    protected $fillable =["name","email","password","password_confirmation","gender","date_of_birth"];

    public static $rules = [
                        'name'  => 'required|min:2|max:100',
                        'email' => 'required|email|unique:users',
                     'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|same:password',
                       'gender' => 'required',
                'date_of_birth' => 'required|date'
    ];
   
    public $errors;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

    public function isValid(){
        
            $validation = Validator::make($this->attributes,static::$rules);

            if($validation->passes()) return true;

            $this->errors = $validation->messages();

            return false;
            
    }

    public function admin(){
            return $this->hasOne('Admin');
    }

    public function isAdmin(){

            if($this->admin == null){return false;}

            return true;
    }

    public function isCurrentUser(){

            if($this->id == Auth::user()->id){return true;}
            
            return false;
    } 
}
