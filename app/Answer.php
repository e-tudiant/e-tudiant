<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'answers';
	public $timestamps = true;

	public function question()
	{
		return $this->belongsTo('Question');
	}

}