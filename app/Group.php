<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'groups';
	public $timestamps = true;

	public function user()
	{
		return $this->belongsToMany('User');
	}

	public function classroom()
	{
		return $this->belongsToMany('Classroom');
	}

}