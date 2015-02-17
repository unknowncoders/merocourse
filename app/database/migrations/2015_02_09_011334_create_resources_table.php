<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResourcesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userResources', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->string('caption',100);
            $table->string('link');
            $table->boolean('check')->default(0);
		    $table->timestamps();

	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

		});

		Schema::create('adminResources', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('subject_id')->unsigned();
            $table->string('caption',100);
            $table->string('link');

		    $table->timestamps();

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
		Schema::drop('userResources');
		Schema::drop('adminResources');
	}

}
