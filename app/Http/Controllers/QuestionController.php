<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Support\Facades\Input;
use App\Quizz;

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
        $quizzs = Quizz::pluck('name', 'id');
        return view('questions.create', compact('quizzs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //dd(Input::get());
        $question = Question::create([
            'question' => Input::get('question'),
            'quizz_id' => Input::get('quizz')
        ]);
        return view('questions.index'/*, compact('added')*/)->withOk('Ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show',  compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit',  compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, QuestionRequest $request)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());
        return redirect(route('question.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect(route('question.index'));
    }

}

?>