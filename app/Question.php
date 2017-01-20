<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'questions';
	public $timestamps = true;

	public function quizz()
	{
		return $this->belongsTo('Quizz');
	}

	public function answer()
	{
		return $this->hasMany('Answer');
	}

}