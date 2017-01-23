<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'questions';
	public $timestamps = true;
    protected $fillable = ['quizz_id', 'question'];

	public function quizz()
	{
		return $this->belongsTo('App\Quizz');
	}

	public function answer()
	{
		return $this->hasMany('App\Answer');
	}

}