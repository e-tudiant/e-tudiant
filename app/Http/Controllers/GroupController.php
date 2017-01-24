<?php 

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller {

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $groups = new Group();
      return view('groups.index', compact('groups'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    $group= new Group();
    return view('groups.create', compact('group'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
      $group = Group::create(['name' => Input::get('name')]);
      return redirect(route('group.index'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($group_id)
  {

      $allUser=User::select(DB::raw("CONCAT(firstname,' ',lastname)AS name"),'id')->pluck('name','id');
      $group=Group::findOrFail($group_id);
      $users=$group->user;
      return view('groups.show', compact('group', 'users','allUser'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($group_id)
  {
      $group = Group::findOrFail($group_id);
      return view('groups.create', compact('group'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($group_id,Request $request)
  {
      $group = Group::findOrFail($group_id);
      $group->update($request->all());
      return redirect(route('group.index'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($group_id)
  {
      {
          Group::destroy($group_id);
          return redirect(route('group.index'));
      }
  }
  public function deleteUserFromGroup($group_id,$user_id){
      $group = Group::findOrFail($group_id);
      $group->user()->detach($user_id);
      return redirect(route('group.index'));
  }
    public function addUserFromGroup($group_id,Request $request){
        $group = Group::findOrFail($group_id);
        $group->user()->sync($request->get('ids'));
        return redirect(route('group.index'));
    }
}

?>