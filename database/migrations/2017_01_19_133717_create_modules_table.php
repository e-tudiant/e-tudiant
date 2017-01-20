<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration {

	public function up()
	{
		Schema::create('modules', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 100);
			$table->string('image_url', 1080);
			$table->string('slider_url', 1080);
			$table->string('slider_token', 100);
		});
	}

	public function down()
	{
		Schema::drop('modules');
	}
}