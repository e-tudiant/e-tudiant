<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	protected $table = 'modules';
	public $timestamps = true;
    protected $fillable = ['name','image_url','slider_url','slider_token'];

	public function classroom()
	{
		return $this->hasMany('App\Classroom');
	}

}