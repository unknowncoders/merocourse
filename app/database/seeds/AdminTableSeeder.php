<?php


class AdminTableSeeder extends Seeder {

	public function run()
	{
        DB::table('admins')->delete();

        $admin1 = User::where('name','=','Bijay Gurung')->first();
        $admin2 = User::where('name','=','Mahendra Thapa')->first();


        $admins = array(
                array(
                        'user_id'       => $admin1->id,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                ),
                array(
                        'user_id'       => $admin2->id,
                        'created_at'    =>  new DateTime,
                        'updated_at'    =>  new DateTime,
                )
        );


        DB::table('admins')->insert( $admins );
	}

}
