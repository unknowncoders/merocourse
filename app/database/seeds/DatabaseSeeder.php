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
 }

}
