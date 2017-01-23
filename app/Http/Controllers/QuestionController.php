<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Input;
use App\Question;
use App\Quizz;
use App\Answer;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $quizz_id = Input::get('quizz_id');
        $question = new Question;
        return view('questions.create', compact('question', 'quizz_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(QuestionRequest $request)
    {
        $question = Question::create([
            'question' => Input::get('question'),
            'quizz_id' => Input::get('quizz_id')
        ]);
        return redirect(route('quizz.show', Input::get('quizz_id')))->withOk('Ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        $quizz = Quizz::findOrFail($question->quizz_id);
        $answers = Answer::all()->where('question_id', $question->id);
        return view('questions.show', compact('question', 'quizz', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.create', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, QuestionRequest $request)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        return redirect(route('quizz.show', $question->quizz_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        Question::destroy($id);
        return redirect(route('quizz.show', $question->quizz_id));
    }

    public function removeFromGroup($id)
    {
        $question = Question::findOrFail($id);
        Question::destroy($id);
        return redirect(route('quizz.show', $question->quizz_id));
    }

}

?>