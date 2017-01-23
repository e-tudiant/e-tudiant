<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'answers';
	public $timestamps = true;
	protected $fillable = ['question_id', 'answer', 'correct'];

	public function question()
	{
		return $this->belongsTo('App\Question');
	}

    public function hasCorrect()
    {
        $correct = Answer::where([
            ['question_id', $this->question_id],
            ['correct', 1],
        ])->get();
        return count($correct) > 0;
    }

}