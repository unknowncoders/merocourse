<?php

class UserCourseTermTableSeeder extends Seeder {

	public function run()
	{
        DB::table('UserCourseTerm')->delete();

        $course = Course::where('name','=','Bachelors of Engineering (Computer)')->first();
        $term   = Term::where('name','=','Fifth Semester')->first();
                
        $courseterm = CourseTerm::where('course_id','=',$course->id)->where('term_id','=',$term->id)->first();

        
        $bijay = User::where('name','=','Bijay Gurung')->first();
        $mahendra = User::where('name','=','Mahendra Thapa')->first();

        $courseterm->users()->attach($bijay->id);
        $courseterm->users()->attach($mahendra->id);

	}

}
