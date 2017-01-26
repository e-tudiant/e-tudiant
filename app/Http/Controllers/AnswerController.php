<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Http\Requests\AnswerRequest;
use App\Answer;
use App\Question;
use App\Quizz;

class AnswerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $answers = Answer::all();
        return view('answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $question_id = Input::get('question_id');
        $answer = new Answer;
        return view('answers.create', compact('answer', 'question_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AnswerRequest $request)
    {
        if (Input::get('correct') == 1 && Question::hasCorrect(Input::get('question_id'))) {
            return back()->withErrors(['correct' => 'Une réponse correct existe déjà.'])->withInput();
        }

        $answer = Answer::create([
            'answer' => Input::get('answer'),
            'question_id' => Input::get('question_id'),
            'correct' => !is_null(Input::get('correct'))
        ]);
        return redirect(route('question.show', Input::get('question_id')))->withOk('Réponse créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        $question = Question::findOrFail($answer->question_id);
        return view('answers.show', compact('answer', 'question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        return view('answers.create', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, AnswerRequest $request)
    {
        $answer = Answer::findOrFail($id);
        $request->merge([
            'correct' => $request->get('correct', 0),
        ]);


        if ($request->get('correct') == 1 && Question::hasCorrect($answer->question_id)) {
            return back()->withErrors(['correct' => 'Une réponse correct existe déjà.'])->withInput();
        }

        $answer->update($request->all());
        return redirect(route('question.show', $answer->question_id))->withOk('Réponse modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $question = Question::findOrFail($answer->question_id);
        $quizz = Quizz::findOrFail($question->quizz_id);
        if ($quizz->hasSession()) {
            return redirect(route('question.show', $answer->question_id))->withError('Ce quizz est dans une session active');
        } else {
            Answer::destroy($id);
            return redirect(route('question.show', $answer->question_id))->withOk('Réponse supprimée');
        }
    }
}
?>

