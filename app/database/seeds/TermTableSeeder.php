<?php

class TermTableSeeder extends Seeder {

	public function run()
	{
        DB::table('terms')->delete();

        $terms = array(
                array(
                        'name'      =>  'First Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Second Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Third Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Fourth Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Fifth Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Sixth Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Seventh Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Eighth Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Ninth Semester',
                        'duration'  =>  6,
                ),
                array(
                        'name'      =>  'Tenth Semester',
                        'duration'  =>  6,
                ),
        );

        DB::table('terms')->insert($terms);

	}

}
