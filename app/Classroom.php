<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model {

	protected $table = 'classrooms';
	public $timestamps = true;
	protected $fillable = ['name', 'status', 'module_id'];

	public function module()
	{
		return $this->BelongsTo('App\Module');
	}

	public function group()
	{
		return $this->belongsToMany('App\Group');
	}

	public function quizz()
	{
		return $this->belongsToMany('App\Quizz');
	}
	public function session()
	{
		return $this->hasMany('App\Session');
	}
	public function getUsers(){
	    $groups=$this->group()->getResults();
	    if (!is_null($groups) && count($groups)>0){
	        foreach ($groups as $group){
	            foreach($group->user()->getResults() as $user)
	            $userlist[$user->id]=$user;
            }
           return array_unique($userlist,SORT_REGULAR);
        }
    }

}