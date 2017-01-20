<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	protected $table = 'modules';
	public $timestamps = true;

	public function classroom()
	{
		return $this->hasMany('Classroom');
	}

}