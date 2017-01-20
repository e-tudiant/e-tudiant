<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

	protected $table = 'sessions';
	public $timestamps = true;

	public function classroom()
	{
		return $this->belongsTo('Classroom');
	}

}