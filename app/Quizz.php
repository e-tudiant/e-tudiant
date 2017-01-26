<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Quizz extends Model {

	protected $table = 'quizzs';
	public $timestamps = true;
	protected $fillable = ['name'];

	public function classroom()
	{
		return $this->belongsToMany('App\Classroom');
	}

	public function question()
	{
		return $this->hasMany('App\Question');
	}

    public function hasSession() {
        $sessions = DB::table('sessions')
            ->join('answers', 'answers.id', '=', 'sessions.answer_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->where('questions.quizz_id', $this->id)
            ->get();
        return count($sessions) > 0;
    }
}