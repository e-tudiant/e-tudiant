<?php
/*
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswerSessionTable extends Migration {

	public function up()
	{
		Schema::create('answer_session', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('session_id')->unsigned();
			$table->integer('answer_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('answer_session');
	}
}*/