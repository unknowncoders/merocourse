<?php

class SubjectTableSeeder extends Seeder {

	public function run()
	{
        DB::table('subjects')->delete();

        $subjects = array(
                array(
                        'name'      =>  'Software Engineering',
                        'difficulty_rating' =>  2.00000,
                        'interest_rating' =>  4.00000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Computer Graphics',
                        'difficulty_rating' =>  3.50000,
                        'interest_rating' =>  2.60000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Data Communication',
                        'difficulty_rating' =>  4.50000,
                        'interest_rating' =>  2.00000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Computer Architecture & Organization',
                        'difficulty_rating' =>  3.20000,
                        'interest_rating' =>  2.00000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Probability and Statistics',
                        'difficulty_rating' =>  3.10000,
                        'interest_rating' =>  2.80000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Instrumentation II',
                        'difficulty_rating' =>  4.20000,
                        'interest_rating' =>  3.70000,
                        'fullMarks'     =>  100,
                ),
                array(
                        'name'      =>  'Communication English',
                        'difficulty_rating' =>  1.50000,
                        'interest_rating' =>  1.90000,
                        'fullMarks'     =>  100,
                ),

        );

        DB::table('subjects')->insert($subjects);
	}

}
