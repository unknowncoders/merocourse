<?php

class PagesController extends \BaseController {

        public function home(){
                return Redirect::action('UsersController@show', array('id' => Auth::user()->id));
        }
}
