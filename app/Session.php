<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function exists($quizz_id, $classroom_id, $user_id) {
        $res = DB::table('sessions')
            ->join('answers', 'answers.id', '=', 'sessions.answer_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->where([['classroom_id', $classroom_id], ['user_id', $user_id], ['questions.quizz_id', $quizz_id]])
            ->get();
        return count($res) > 0;
    }

}