<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomQuizzTable extends Migration {

	public function up()
	{
		Schema::create('classroom_quizz', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('classroom_id')->unsigned();
			$table->integer('quizz_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('classroom_quizz');
	}
}