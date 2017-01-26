<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassroomModuleTable extends Migration {

	public function up()
	{
		Schema::create('classroom_module', function(Blueprint $table) {
			$table->timestamps();
			$table->integer('classroom_id')->unsigned();
			$table->integer('module_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('classroom_module');
	}
}