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

        public function showsubject($facultyname, $semestername)
        {
            $facultyid = Faculty::where('faculty_name', $facultyname)->pluck('id'); 
            $semesterid =Semester::where('semester_name', $semestername)->pluck('id'); 
            $faculty = Faculty::find($facultyid)->subject()->wherePivot('semester_id',$semesterid)->get();
            $user = Auth::user();
            return View::make('home/subject')->with('faculty', $faculty)->with('user',$user);
    
        }
           
        public function showreview($subjectname)
        {
                $subjectid = Subject::where('subject_name', $subjectname)->pluck('id');
                $user = Auth::user();
                return View::make('home/review'); 
        }
}
