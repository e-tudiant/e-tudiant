<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'groups';
	public $timestamps = true;
    public $fillable=['name'];

	public function users()
	{
		return $this->belongsToMany('App\User');
	}

	public function classroom()
	{
		return $this->belongsToMany('Classroom');
	}

}