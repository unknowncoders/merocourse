<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseTermSubjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CourseTermSubjects', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('courseterm_id')->unsigned();
            $table->integer('subject_id')->unsigned();
			$table->timestamps();
           
            $table->foreign('courseterm_id')->references('id')->on('CourseTerms')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CourseTermSubjects');
	}

}
