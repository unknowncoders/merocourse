<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		 $this->call('UserTableSeeder');
		 $this->call('AdminTableSeeder');
		 $this->call('CourseTableSeeder');
		 $this->call('TermTableSeeder');
		 $this->call('SubjectTableSeeder');
		 $this->call('CourseTermTableSeeder');
		 $this->call('CourseTermSubjectTableSeeder');
         $this->call('ReviewTableSeeder');
		 $this->call('UserCourseTableSeeder');
		 $this->call('UserCourseTermTableSeeder');
        
    }

}


