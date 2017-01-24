<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizzRequest;
use Illuminate\Support\Facades\Input;
use App\Quizz;
use App\Question;
use App\Classroom;

class QuizzController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $quizzs = Quizz::all();
        return view('quizzs.index', compact('quizzs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $quizz = new Quizz;
        $classrooms = Classroom::pluck('name', 'id');
        return view('quizzs.create', compact('quizz', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(QuizzRequest $request)
    {
        $quizz = Quizz::create(['name' => Input::get('name')]);
        $quizz->classroom()->sync(!is_null(Input::get('classroom_id')) ? Input::get('classroom_id') : []);
        return redirect(route('quizz.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $quizz = Quizz::findOrFail($id);
        $questions = Question::all()->where('quizz_id', $quizz->id);
        return view('quizzs.show', compact('quizz', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $quizz = Quizz::findOrFail($id);
        $classrooms = Classroom::pluck('name', 'id');
        return view('quizzs.create', compact('quizz', 'classrooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, QuizzRequest $request)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->update($request->all());
        $quizz->classroom()->sync($request->get('classroom_id', []));
        return redirect(route('quizz.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $quizz = Quizz::findOrFail($id);
        $quizz->classroom()->detach();
        $quizz->delete();
        return redirect(route('quizz.index'));
    }

}

?>