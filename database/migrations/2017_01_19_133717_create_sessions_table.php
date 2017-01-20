<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration {

	public function up()
	{
		Schema::create('sessions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('classroom_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('answer_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('sessions');
	}
}