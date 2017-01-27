<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'questions';
	public $timestamps = true;
    protected $fillable = ['quizz_id', 'question'];

	public function quizz()
	{
		return $this->belongsTo('App\Quizz');
	}

	public function answer()
	{
		return $this->hasMany('App\Answer');
	}

    public static function hasCorrect($id)
    {
        $correct = Answer::where([
            ['question_id', $id],
            ['correct', 1],
        ])->get();
        return count($correct) > 0;
    }

    public function getCorrect() {
	    $answers = $this->answer;
	    $correct = null;
	    foreach ($answers as $answer) {
	        if($answer->correct) {
	            $correct = $answer;
            }
        }
        return $correct;
    }
}