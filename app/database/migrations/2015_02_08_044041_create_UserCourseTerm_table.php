<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCourseTermTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('UserCourseTerm', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('courseterm_id')->unsigned();
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('courseterm_id')->references('id')->on('CourseTerm')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('UserCourseTerm');
	}

}
