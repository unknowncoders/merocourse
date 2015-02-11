<?php

class CourseTermTableSeeder extends Seeder {

	public function run()
	{
            DB::table('CourseTerms')->delete();

           $course = Course::where('name','=','Bachelors of Engineering (Computer)')->first();

            $sem1 = Term::where('name','=','First Semester')->first();
            $sem2 = Term::where('name','=','Second Semester')->first();
            $sem3 = Term::where('name','=','Third Semester')->first();
            $sem4 = Term::where('name','=','Fourth Semester')->first();
            $sem5 = Term::where('name','=','Fifth Semester')->first();
            $sem6 = Term::where('name','=','Sixth Semester')->first();
            $sem7 = Term::where('name','=','Seventh Semester')->first();
            $sem8 = Term::where('name','=','Eighth Semester')->first();

            $course->terms()->attach($sem1->id);
            $course->terms()->attach($sem2->id);
            $course->terms()->attach($sem3->id);
            $course->terms()->attach($sem4->id);
            $course->terms()->attach($sem5->id);
            $course->terms()->attach($sem6->id);
            $course->terms()->attach($sem7->id);
            $course->terms()->attach($sem8->id);

	}

}
