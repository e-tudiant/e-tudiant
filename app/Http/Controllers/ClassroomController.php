<?php

namespace App\Http\Controllers;

use App\Events\ClassroomMessageEvent;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Support\Facades\Input;
use App\Classroom;
use App\Module;
use App\Group;

class ClassroomController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $classroom = new Classroom;
        $modules = Module::pluck('name', 'id');
        $groups = Group::pluck('name', 'id');
        return view('classrooms.create', compact('classroom', 'modules', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ClassroomRequest $request)
    {
        $classroom = Classroom::create([
            'name' => Input::get('name'),
            'module_id' => Input::get('module_id'),
            'status' => !is_null(Input::get('status'))
        ]);
        $classroom->group()->sync(!is_null(Input::get('groups')) ? Input::get('groups') : []);
        return redirect(route('classroom.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.show', compact('classroom', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        $modules = Module::pluck('name', 'id');
        $groups = Group::pluck('name', 'id');
        return view('classrooms.create', compact('classroom', 'modules', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, ClassroomRequest $request)
    {
        $classroom = Classroom::findOrFail($id);
        $request->merge([
            'status' => $request->get('status', 0),
        ]);
        $classroom->update($request->all());
        $classroom->group()->sync($request->get('group_id', []));
        return redirect(route('classroom.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->group()->detach();
        $classroom->delete();
        return redirect(route('classroom.index'));
    }

    /**
     * Enter in the specified classroom.
     *
     * @param  int $id
     * @return Response
     */
    public function enter($id)
    {
        return view('enter_classroom')->withClassroomId($id);
    }

    /**
     * Send a message to the classroom.
     *
     * @param  int $id
     * @return Response
     */
    public function send(ClassroomRequest $request, $classroomId)
    {
        broadcast(new ClassroomMessageEvent($classroomId, $request->input('message')));
    }

}

?>