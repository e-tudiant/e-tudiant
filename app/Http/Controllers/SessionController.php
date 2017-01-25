<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SessionRequest;

class SessionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($quizz_id, $classroom_id)
    {

        if(Session::exists($quizz_id, $classroom_id, Auth::user()->id)) {
            return null;
            //return 'Vous avez déjà passé ce test.';
            //return redirect(route('home'))->withError('Vous avez déjà passé ce test.');

        }

        //Session::where([['classroom_id', $classroom_id], ['user_id', Auth::user()->id]])->get();
        $quizz = Quizz::findOrFail($quizz_id);
        return view('sessions.create', compact('quizz', 'classroom_id'))->withOk('Le quizz a été soumis au formateur.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($quizz_id, $classroom_id, SessionRequest $request)
    {
        $quizz = Quizz::findOrFail($quizz_id);
        foreach ($quizz->question as $question) {
            if(is_null(Input::get('question_' . $question->id))) {
                return back()->withInput()->withErrors(['question_' . $question->id => 'Selectionnez une réponse']);
            }
            $session = Session::create([
                'user_id' => Auth::user()->id,
                'classroom_id' => $classroom_id,
                'answer_id' => Input::get('question_' . $question->id)
            ]);
        }
        return redirect(route('classroom.enter', $classroom_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>