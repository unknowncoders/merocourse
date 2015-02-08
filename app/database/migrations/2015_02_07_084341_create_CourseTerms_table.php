<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourseTermsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CourseTerms', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('term_id')->unsigned();
			$table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('CourseTerms');
	}

}
