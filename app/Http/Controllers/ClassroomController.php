<?php 

namespace App\Http\Controllers;

use App\Events\ClassroomMessageEvent;
use Illuminate\Http\Request;

class ClassroomController extends Controller {

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
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }

  /**
   * Enter in the specified classroom.
   *
   * @param  int  $id
   * @return Response
   */
  public function enter($id)
  {
    return view('enter_classroom')->withClassroomId($id);
  }

  /**
   * Send a message to the classroom.
   *
   * @param  int  $id
   * @return Response
   */
  public function send(Request $request, $classroomId)
  {
    broadcast(new ClassroomMessageEvent($classroomId, $request->input('message')));
  }

}

?>