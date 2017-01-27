<?php

namespace App\Http\Controllers;

use App\Events\ClassroomMessageEvent;
use App\Events\ClassroomWantModuleEvent;
use App\Events\ClassroomChangeModuleEvent;
use App\Events\ClassroomQuizzEvent;
use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\ClassroomSendRequest;
use App\Http\Requests\ClassroomChangeModuleRequest;
use App\Http\Requests\ClassroomQuizzRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Classroom;
use App\Module;
use App\Group;
use App\Session;
use App\Quizz;

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
        $quizzs= Quizz::pluck('name','id');
        return view('classrooms.create', compact('classroom', 'modules', 'groups','quizzs'));
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
        $classroom->quizz()->sync(!is_null(Input::get('quizz_id')) ? Input::get('quizz_id') : []);
        return redirect(route('classroom.index'))->withOk('Classe créée');
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
        $quizzs=Quizz::pluck('name','id');
        return view('classrooms.create', compact('classroom', 'modules', 'groups','quizzs'));
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
        $classroom->module()->sync($request->get('module_id', []));
        $classroom->group()->sync($request->get('group_id', []));
        $classroom->quizz()->sync($request->get('quizz_id', []));
        return redirect(route('classroom.index'))->withOk('Classe modifiée');
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
        return redirect(route('classroom.index'))->withOk('Classe supprimée');
    }

    /**
     * Enter in the specified classroom.
     *
     * @param  int $id
     * @return Response
     */
    public function enter($id)
    {
        $user = Auth::user();
        if (!$user->canJoinClassroom($id)) {
            return redirect(route('classroom.choose'))->withError("Vous n'avez pas accès à cette salle de classe");
        }
        $classroom=Classroom::findOrFail($id);
        return view('enter_classroom', compact('classroom'));
//            ->withClassroomId($id)
//            ->withModuleList(["1"=>"Linux", "7"=>"Node.js"])
//            ->withQuizzList(["1"=>"Quizz0", "2"=>"Quizz1"]);
    }

    public function choose()
    {

        if(Auth::user()->role_id < 3) {
            $classrooms = DB::table('classrooms')
                ->select('classrooms.id', 'classrooms.name', 'classrooms.status')
                ->orderBy('classrooms.status', 'asc')
                ->orderBy('classrooms.name', 'asc')
                ->get();
        } else {
            $classrooms = DB::table('classrooms')
                ->select('classrooms.id', 'classrooms.name', 'classrooms.status')
                ->join('classroom_group', 'classrooms.id', '=', 'classroom_group.classroom_id')
                ->join('groups', 'groups.id', '=', 'classroom_group.group_id')
                ->join('group_user', 'groups.id', '=', 'group_user.group_id')
                ->where('group_user.user_id', Auth::user()->id)
                ->groupBy('classrooms.id', 'classrooms.name', 'classrooms.status')
                ->orderBy('classrooms.status', 'asc')
                ->orderBy('classrooms.name', 'asc')
                ->get();
        }
        return view('classrooms.choose', compact('classrooms'));
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

    /**
     * Start a quizz
     *
     * @param  Request $request
     * @param  int $classroomId
     * @return void
     */
    public function startQuizz(ClassroomQuizzRequest $request, $classroomId)
    {
        broadcast(new ClassroomQuizzEvent($classroomId, $request->input('quizz_id'), 'start'));
    }

    /**
     * Stop a quizz
     *
     * @param  Request $request
     * @param  int $classroomId
     * @return void
     */
    public function stopQuizz(ClassroomQuizzRequest $request, $classroomId)
    {
        broadcast(new ClassroomQuizzEvent($classroomId, $request->input('quizz_id'), 'stop'));
    }
}

?>