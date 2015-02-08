<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->char('password',60);
            $table->char('gender',1);
            $table->date('date_of_birth');
            $table->date('last_active');
            $table->char('confirmation_code',30);
            $table->boolean('confirmed')->default(false);
            $table->string('remember_token',255)->nullable();
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
		Schema::drop('users');
	}

}

