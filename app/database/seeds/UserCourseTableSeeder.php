<?php

class UserCourseTableSeeder extends Seeder {

	public function run()
	{
            DB::table('UserCourse')->delete();

            $bijay = User::where('name','=','Bijay Gurung')->first();
            $mahendra = User::where('name','=','Mahendra Thapa')->first();

            $bct = Course::where('name','=','Bachelors of Engineering (Computer)')->first();

            $bct->users()->attach($bijay->id);        
            $bct->users()->attach($mahendra->id);        

	}

}
