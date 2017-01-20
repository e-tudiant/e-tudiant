<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', [
    'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
    'uses' => 'TestController@index',
    'roles' => ['formateur'] // Only an administrator, or a manager can access this route
]);

//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index');
Route::resource('group', 'GroupController');
Route::resource('groupuser', 'GroupUserController');
Route::resource('quizz', 'QuizzController');
Route::resource('question', 'QuestionController');
Route::resource('answer', 'AnswerController');
Route::resource('classroom', 'ClassroomController');
Route::resource('classroomgroup', 'ClassroomGroupController');
Route::resource('module', 'ModuleController');
Route::resource('classroomquizz', 'ClassroomQuizzController');
Route::resource('session', 'SessionController');

