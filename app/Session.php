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

    public static function getAnswers($quizz_id, $classroom_id, $user_id) {
	    $answers = DB::table('sessions')
            ->join('answers', 'answers.id', '=', 'sessions.answer_id')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->where([['classroom_id', $classroom_id], ['user_id', $user_id], ['questions.quizz_id', $quizz_id]])
            ->get();
	    return $answers;
    }

    public static function exists($quizz_id, $classroom_id, $user_id) {
        $answers = Session::getAnswers($quizz_id, $classroom_id, $user_id);
        return count($answers) > 0;
    }
    public static function quizzResult($quizz_id, $classroom_id, $user_id) {
        $questions = Question::where('quizz_id', $quizz_id)->get();
        $nb_questions = count($questions);
        $sessions = Session::getAnswers($quizz_id, $classroom_id, $user_id);
        if(!(count($sessions) > 0)) {
            return null;
        }
        $nb_correct = 0;
        foreach ($sessions as $session) {
            $answer = Answer::findOrFail($session->answer_id);
            if ($answer->correct) {
                $nb_correct++;
            }
        }
        $success_percent = $nb_correct * 100 / $nb_questions;

        return [
            'nb_questions' => $nb_questions,
            'nb_correct' => $nb_correct,
            'success_percent' => $success_percent,
        ];
    }
}