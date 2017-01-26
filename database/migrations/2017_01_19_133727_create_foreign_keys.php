<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
        Schema::table('user_infos',function (Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('quizz_id')->references('id')->on('quizzs')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('classroom_group', function(Blueprint $table) {
			$table->foreign('classroom_id')->references('id')->on('classrooms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('classroom_group', function(Blueprint $table) {
			$table->foreign('group_id')->references('id')->on('groups')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('classroom_quizz', function(Blueprint $table) {
			$table->foreign('classroom_id')->references('id')->on('classrooms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('classroom_quizz', function(Blueprint $table) {
			$table->foreign('quizz_id')->references('id')->on('quizzs')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
        Schema::table('classroom_module', function(Blueprint $table) {
            $table->foreign('classroom_id')->references('id')->on('classrooms')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('classroom_module', function(Blueprint $table) {
            $table->foreign('module_id')->references('id')->on('modules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
		Schema::table('sessions', function(Blueprint $table) {
			$table->foreign('classroom_id')->references('id')->on('classrooms')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sessions', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('sessions', function(Blueprint $table) {
			$table->foreign('answer_id')->references('id')->on('answers')
						->onDelete('restrict')
						->onUpdate('restrict');
		});

	}

	public function down()
	{
        Schema::table('user_infos', function(Blueprint $table) {
            $table->dropForeign('user_infos_user_id_foreign');
        });
		Schema::table('group_user', function(Blueprint $table) {
			$table->dropForeign('group_user_user_id_foreign');
		});
		Schema::table('group_user', function(Blueprint $table) {
			$table->dropForeign('group_user_group_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_quizz_id_foreign');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_question_id_foreign');
		});
		Schema::table('classroom_group', function(Blueprint $table) {
			$table->dropForeign('classroom_group_classroom_id_foreign');
		});
		Schema::table('classroom_group', function(Blueprint $table) {
			$table->dropForeign('classroom_group_group_id_foreign');
		});
		Schema::table('classroom_quizz', function(Blueprint $table) {
			$table->dropForeign('classroom_quizz_classroom_id_foreign');
		});
		Schema::table('classroom_quizz', function(Blueprint $table) {
			$table->dropForeign('classroom_quizz_quizz_id_foreign');
		});
        Schema::table('classroom_module', function(Blueprint $table) {
            $table->dropForeign('classroom_module_classroom_id_foreign');
        });
        Schema::table('classroom_module', function(Blueprint $table) {
            $table->dropForeign('classroom_module_module_id_foreign');
        });
        Schema::table('sessions', function(Blueprint $table) {
			$table->dropForeign('sessions_classroom_id_foreign');
		});
        Schema::table('sessions', function(Blueprint $table) {
			$table->dropForeign('sessions_user_id_foreign');
		});
        Schema::table('sessions', function(Blueprint $table) {
            $table->dropForeign('sessions_answer_id_foreign');
        });
        Schema::table('classrooms', function(Blueprint $table) {
            $table->dropForeign('classrooms_module_id_foreign');
        });
	}
}