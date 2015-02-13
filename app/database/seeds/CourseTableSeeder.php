<?php

class CourseTableSeeder extends Seeder {

	public function run()
	{
            DB::table('courses')->delete();

            $courses = array(
                    array(
                            'name'      =>  'Bachelors of Engineering (Computer)',
                            'duration'  =>  48,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                    ),
                    array(
                            'name'      =>  'Bachelors of Engineering (Electronics)',
                            'duration'  =>  48,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                    ),   
                    array(
                            'name'      =>  'Bachelors of Engineering (Architecture)',
                            'duration'  =>  60,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                    ),   

            );

        DB::table('courses')->insert( $courses );
        
	}

}
