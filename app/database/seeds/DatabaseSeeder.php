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

		// $this->call('UserTableSeeder');
           $this->call('HomePageSeeder');
           $this->command->info('Home Page Seeds Finished');
        
    }

}

class HomePageSeeder extends Seeder{

 public function run()
 {
    DB::table('faculty')->delete();
    DB::table('semester')->delete();
    DB::table('subject')->delete();

    $architecture  = Faculty::create(array(
           'faculty_name' => 'Architecture Engineering'
   ));
        $civil  = Faculty::create(array(
           'faculty_name' => 'Civil Engineering'
   ));

    $computer = Faculty::create(array(
           'faculty_name' => 'Computer Engineering'
   ));

    $electrical  = Faculty::create(array(
           'faculty_name' => 'Electrical Engineering'
   ));

    $electronics  = Faculty::create(array(
           'faculty_name' => 'Electronics and Communication Engineering'
   ));

    $mechanical  = Faculty::create(array(
           'faculty_name' => 'Mechanical Engineering'
   ));

    $first = Semester::create(array(
            'semester_name' =>'first semester'
    )); 
 
    $second = Semester::create(array(
            'semester_name' =>'second semester'
    )); 
    $third = Semester::create(array(
            'semester_name' =>'third semester'
    )); 
    $fourth = Semester::create(array(
            'semester_name' =>'fourth semester'
    )); 
    $fifth = Semester::create(array(
            'semester_name' =>'fifth semester'
    )); 
    $sixth = Semester::create(array(
            'semester_name' =>'sixth semester'
    )); 
    $seventh = Semester::create(array(
            'semester_name' =>'seventh semester'
    ));    
    $eighth = Semester::create(array(
            'semester_name' =>'eighth semester'
    )); 
    $ninth = Semester::create(array(
            'semester_name' =>'ninth semester'
    )); 
    $tenth = Semester::create(array(
            'semester_name' =>'tenth semester'
    )); 

    $physics = Subject::create(array(
              'subject_name' => 'Physics'
    ));
    $applied_mechanics = Subject::create(array(
              'subject_name' => 'Applied Mechanics'
    ));
    $c_prog = Subject::create(array(
              'subject_name' => 'C Programming'
      ));

    $this->command->info('Faculty, Semester and Subject  seeds successfully');

 }

}
