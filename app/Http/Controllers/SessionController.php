<?php

namespace App\Http\Controllers;

use App\Quizz;
use App\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
    public function create($quizz_id)
    {
        $quizz = Quizz::findOrFail($quizz_id);
        return view('sessions.create', compact('quizz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store($classroom_id)
    {

        $session = Session::create([
            'answer_id' => Input::get('answer_id'),
            'user_id' => Auth::user()->id,
            'classroom_id' => $classroom_id,
        ]);
        return view('home');
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