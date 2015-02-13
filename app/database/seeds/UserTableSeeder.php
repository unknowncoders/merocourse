<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->delete();

        $users = array(
                array( 
                        'name'          =>  'Bijay Gurung',
                        'email'         =>  'bjgurung10@gmail.com',
                        'password'      =>  Hash::make('something'),
                        'gender'        =>  'm',
                        'date_of_birth' =>  '1995-04-01',
                        'about_me'      =>  'Just a thought',
                        'confirmed'     =>  1,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                ),
                array( 
                        'name'          =>  'Mahendra Thapa',
                        'email'         =>  'crazzzy_rider27@gmail.com',
                        'password'      =>  Hash::make('laziness'),
                        'gender'        =>  'm',
                        'date_of_birth' =>  '1994-06-10',
                        'about_me'      =>  'The Dark Knight',
                        'confirmed'     =>  1,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                ),
                array( 
                        'name'          =>  'Monkey D Luffy',
                        'email'         =>  'pirateking@gmail.com',
                        'password'      =>  Hash::make('ilovemeat'),
                        'gender'        =>  'm',
                        'date_of_birth' =>  '1994-04-10',
                        'about_me'      =>  'Captain at Strawhats',
                        'confirmed'     =>  1,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                )
        );

        DB::table('users')->insert( $users );
	}

}
