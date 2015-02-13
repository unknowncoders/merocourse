<?php

class CourseTermSubjectTableSeeder extends Seeder {

	public function run()
	{
        DB::table('CourseTermSubjects')->delete();

        $course = Course::where('name','=','Bachelors of Engineering (Computer)')->first();
        $term   = Term::where('name','=','Fifth Semester')->first();
                
        $courseterm = CourseTerm::where('course_id','=',$course->id)->where('term_id','=',$term->id)->first();


        $sub1 = Subject::where('name','=','Software Engineering')->first();
        $sub2 = Subject::where('name','=','Computer Graphics')->first();
        $sub3 = Subject::where('name','=','Data Communication')->first();
        $sub4 = Subject::where('name','=','Computer Architecture & Organization')->first();
        $sub5 = Subject::where('name','=','Probability and Statistics')->first();
        $sub6 = Subject::where('name','=','Instrumentation II')->first();
        $sub7 = Subject::where('name','=','Communication English')->first();

        $courseterm->subjects()->attach($sub1->id);
        $courseterm->subjects()->attach($sub2->id);
        $courseterm->subjects()->attach($sub3->id);
        $courseterm->subjects()->attach($sub4->id);
        $courseterm->subjects()->attach($sub5->id);
        $courseterm->subjects()->attach($sub6->id);
        $courseterm->subjects()->attach($sub7->id);

	}

}
