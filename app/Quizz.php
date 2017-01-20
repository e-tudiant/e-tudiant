<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model {

	protected $table = 'quizzs';
	public $timestamps = true;
	protected $fillable = ['name'];

	public function classroom()
	{
		return $this->belongsToMany('Classroom');
	}

	public function question()
	{
		return $this->hasMany('Question');
	}

}