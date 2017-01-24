<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomsTable extends Migration {

	public function up()
	{
		Schema::create('classrooms', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->integer('status')->unsigned();
			$table->integer('module_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('classrooms');
	}
}