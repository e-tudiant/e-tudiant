<?php

namespace App\Http\Controllers;

use App\User;
use App\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UserInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $data = User::find($id);
            return view('userinfos.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $userinfo=new User_info();
        return view('userinfos.create',compact('userinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $userInfo = User_info::create([
                'user_id' => $user_id,
                'social_network'=>Input::get('social_network'),
                'github_link'=>Input::get('social_network'),
                'phone'=>Input::get('phone'),
                'avatar'=>Input::get('avatar'),
                'phonebook'=>Input::get('phonebook')
            ]);
            return redirect(route('userinfo.index'));
        }

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
        $userinfo = User_info::findOrFail($id);
        return view('userinfos.create', compact('userinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id,Request $request)
    {
//        dd($request);
        $userinfo = User_info::findOrFail($id);
        $userinfo->update($request->all());
        return redirect(route('userinfo.index'));
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