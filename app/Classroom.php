<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model {

	protected $table = 'classrooms';
	public $timestamps = true;

	public function module()
	{
		return $this->hasOne('Module');
	}

	public function group()
	{
		return $this->belongsToMany('Group');
	}

	public function quizz()
	{
		return $this->belongsToMany('Quizz');
	}

	public function session()
	{
		return $this->hasMany('Session');
	}

}