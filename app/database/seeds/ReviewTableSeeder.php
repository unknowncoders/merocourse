<?php

class ReviewTableSeeder extends Seeder {

	public function run()
	{
        DB::table('reviews')->delete();

        $reviewer = User::where('name','=','Bijay Gurung')->first();
        $reviewer2 = User::where('name','=','Mahendra Thapa')->first();
        $sub = Subject::where('name','=','Software Engineering')->first();

        $reviews = array(
                array(
                        'user_id'       => $reviewer->id,
                        'subject_id'    => $sub->id,
                        'content'       => '(Un)Fortunately, you have to complete a project.',
                ),
                array(
                        'user_id'       => $reviewer2->id,
                        'subject_id'    => $sub->id,
                        'content'       => 'It is an interesting subject.',
                ),
        );

        DB::table('reviews')->insert($reviews);

	}

}
