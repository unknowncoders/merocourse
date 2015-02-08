<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDifficultyRatingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('difficultyRatings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->integer('rating');
			$table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
		});
        
        Schema::create('interestRatings', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id');
            $table->integer('subject_id');
            $table->integer('rating');
			$table->timestamps();
		});

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('difficultyRatings');
		Schema::drop('interestRatings');
	}

}
