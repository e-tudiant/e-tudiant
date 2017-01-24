<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

	protected $table = 'sessions';
	public $timestamps = true;
	protected $fillable = ['answer_id', 'classroom_id', 'user_id'];

	public function classroom()
	{
		return $this->belongsTo('Classroom');
	}

}