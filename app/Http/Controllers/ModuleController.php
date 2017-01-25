<?php

namespace App\Http\Controllers;

use App\Http\Requests\ModuleRequest;
use App\Module;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $module = new Module();
        return view('modules.create', compact('module'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ModuleRequest $request)
    {

        $file = array('image_url' => Input::file('image_url'));
        // setting up rules
        $rules = array('image_url' => 'required|mimes:jpeg,bmp,png');
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to(route('module.index'))->withInput()->withErrors($validator);
        } else {
            // checking file is valid.
            if (Input::file('image_url')->isValid()) {
                $destinationPath = public_path() . '/uploads/images/modules/';
                $extension = Input::file('image_url')->getClientOriginalExtension(); // getting image extension
                $fileName = date('YmdHi') . '_module_picture' . $request->name . '_picture.' . $extension; // renameing image
                Input::file('image_url')->move($destinationPath, $fileName);
                $module = Module::create([
                    'name' => $request->name,
                    'image_url' => $fileName,
                    'slider_url' => $request->slider_url,
                    'slider_token' => $request->slider_token
                ]);
                return redirect(route('module.index'));

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show()
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
        $module = Module::findOrFail($id);

        return view('modules.create', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, ModuleRequest $request)
    {
        $module = Module::findOrFail($id);
//        dd($request->files);
        if ($request->files->get('image_url')) {
            $file = array('image_url' => $request->files->get('image_url'));
            // setting up rules
            $rules = array('image_url' => 'required|mimes:jpeg,bmp,png');
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return Redirect::to(route('module.edit'))->withInput()->withErrors($validator);
            } else {
                // checking file is valid.
                if ($request->files->get('image_url')->isValid()) {
                    $destinationPath = public_path() . '/uploads/images/modules/';
                    $extension = $request->files->get('image_url')->getClientOriginalExtension(); // getting image extension
                    $fileName = date('YmdHi') . '_module_picture' . $extension; // renaming image
                    $request->files->get('image_url')->move($destinationPath, $fileName); // uploading file to given path
                    $updateImage = array('image_url' => $fileName);
                }
            }
        }
        $updaterequest = array(

            'name' => $request->name,
            'slider_url' => $request->slider_url,
            'slider_token' => $request->slider_token,
        );
        if (!empty($updateImage)) {
            $updaterequest = array_merge($updaterequest, $updateImage);
        }
        $module->update($updaterequest);
        return redirect(route('module.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        Module::destroy($id);
        return redirect(route('module.index'));
    }

}

?>