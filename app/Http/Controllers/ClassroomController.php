<?php

namespace App\Http\Controllers;

use App\Events\ClassroomMessageEvent;
use App\Events\ClassroomWantModuleEvent;
use App\Events\ClassroomChangeModuleEvent;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\ClassroomSendRequest;
use App\Http\Requests\ClassroomChangeModuleRequest;
use Illuminate\Support\Facades\Input;
use App\Classroom;
use App\Module;
use App\Group;
use App\Session;

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
            'status' => !is_null(Input::get('status'))
        ]);
        $classroom->module()->sync(!is_null(Input::get('module_id'))? Input::get('group_id'):[]);
        $classroom->group()->sync(!is_null(Input::get('group_id')) ? Input::get('group_id') : []);
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
//        dd($request->all());
        $classroom->update($request->all());
        $classroom->module()->sync($request->get('module_id', []));
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
        // @TODO : Hydrate the module list
        // @TODO : Hydrate the quizz list
        return view('enter_classroom')
            ->withClassroomId($id)
            ->withModuleList(["1"=>"Linux", "7"=>"Node.js"])
            ->withQuizzList(["1"=>"Quizz0", "2"=>"Quizz1"]);
    }

    /**
     * Send a message to the classroom.
     *
     * @param  Request $request
     * @param  int $classroomId
     * @return Response
     */
    public function send(ClassroomSendRequest $request, $classroomId)
    {
        broadcast(new ClassroomMessageEvent($classroomId, $request->input('message')));
    }


    /**
     * Change the classroom's module.
     *
     * @param  int $classroomId
     * @return void
     */
    public function wantModule($classroomId)
    {
        broadcast(new ClassroomWantModuleEvent($classroomId));
    }

    /**
     * Change the classroom's module.
     *
     * @param  Request $request
     * @param  int $classroomId
     * @return void
     */
    public function initModule(ClassroomChangeModuleRequest $request, $classroomId)
    {
        $module = Module::findOrFail($request->input('module_id'));
        broadcast(new ClassroomChangeModuleEvent($classroomId, $module, 'init'));
    }

    /**
     * Change the classroom's module.
     *
     * @param  Request $request
     * @param  int $classroomId
     * @return void
     */
    public function changeModule(ClassroomChangeModuleRequest $request, $classroomId)
    {
        $module = Module::findOrFail($request->input('module_id'));
        broadcast(new ClassroomChangeModuleEvent($classroomId, $module, 'change'));
        
    }

    public function quizzResult($quizz_id, $classroom_id, $user_id) {
        return response()->json(Session::quizzResult($quizz_id, $classroom_id, $user_id));
    }

}

?>