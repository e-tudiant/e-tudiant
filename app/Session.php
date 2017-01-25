<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model {

	protected $table = 'sessions';
	public $timestamps = true;
	protected $fillable = ['answer_id', 'classroom_id', 'user_id'];

	public function classroom()
	{
		return $this->belongsTo('App\Classroom');
	}

    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}