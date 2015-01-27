<?php

class HomeController extends BaseController {
         
        public function showhome()
        {
        $user = Auth::user();
        $faculty  = Faculty::all();
        $semester = Semester::all();
        $semester1 = Semester::take(8)->get();
        return View::make('home/home')->with('faculty',$faculty)->with('semester',$semester)->with('semester1' , $semester1)->with('user', $user) ;
          }
}
