<?php

namespace App\Http\Controllers;

use App\User;
use App\User_info;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\Redirect;

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
            $user = User::find($id);
            $userinfo = User_info::where('user_id', '=', $id)->first();
            return view('userinfos.index', compact('user', 'userinfo'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $userinfo = new User_info();
        return view('userinfos.create', compact('userinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
//
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $file = array('avatar' => Input::file('avatar'));
            // setting up rules
            $rules = array('avatar' => 'required|mimes:jpg,jpeg,bmp,png');
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to(route('userinfo.index'))->withInput()->withErrors($validator);
            } else {
                // checking file is valid.
                if (Input::file('avatar')->isValid()) {
                    $destinationPath = public_path() . '/uploads/images/users/';
                    $extension = Input::file('avatar')->getClientOriginalExtension(); // getting image extension
                    $fileName = date('YmdHi').'_user_' . $user_id . '_picture.' . $extension; // renameing image
                    Input::file('avatar')->move($destinationPath, $fileName); // uploading file to given path
                    $userInfo = User_info::create([
                        'user_id' => $user_id,
                        'social_network' => Input::get('social_network'),
                        'github_link' => Input::get('github_link'),
                        'phone' => Input::get('phone'),
                        'avatar' => $fileName,
                        'phonebook' => Input::get('phonebook')
                    ]);
                    return redirect(route('userinfo.index'));
                }
            }
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
    public function update($id, Request $request)
    {
        $user_id = Auth::user()->id;
//        var_dump(intval($request->phonebook));
        if ($request->files->get('avatar')) {
            $file = array('avatar' => $request->files->get('avatar'));
            // setting up rules
            $rules = array('avatar' => 'required|mimes:jpeg,bmp,png');
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {

                // send back to the page with the input data and errors
                return Redirect::to(route('userinfo.index'))->withInput()->withErrors($validator);
            } else {
                // checking file is valid.
                if ($request->files->get('avatar')->isValid()) {
                    $destinationPath = public_path() . '/uploads/images/users/';
                    $extension = $request->files->get('avatar')->getClientOriginalExtension(); // getting image extension
                    $fileName = date('YmdHi').'_user_' . $user_id . '_picture.' . $extension; // renameing image
                    $request->files->get('avatar')->move($destinationPath, $fileName); // uploading file to given path
                    $updateAvatar=array('avatar' => $fileName);
                }
            }
        }
        $userinfo = User_info::findOrFail($id);
        $updaterequest=array(
            'user_id' => $user_id,
            'social_network' => $request->social_network,
            'github_link' => $request->github_link,
            'phone' => $request->phone,
            'phonebook' => intval($request->phonebook),
        );
        if(!empty($updateAvatar)){
            $updaterequest=array_merge($updaterequest,$updateAvatar);
        }
//        dd($updateAvatar,$updaterequest);
        $userinfo = User_info::findOrFail($id);
        $userinfo->update($updaterequest);
        return redirect(route('userinfo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public
    function destroy($id)
    {

    }

}

?>