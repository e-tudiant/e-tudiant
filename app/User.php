<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\App;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['lastname','firstname','email', 'password','role_id'];
    protected $hidden = ['password', 'remember_token'];

    public function group(){
        return $this->belongsToMany('App\Group');
    }

    public function session(){
        return $this->hasMany('App\Session');
    }

    /*RELATION TABLE USER INFO*/
    public function User_info(){
        return $this->hasOne('App\User_info');
    }

    /*GESTION DES ROLES*/
    public function role()
    {
        return $this->hasOne('App\Role', 'id', 'role_id');
    }
    public function hasRole($roles)
    {
        $this->have_role = $this->getUserRole();
//        if($this->have_role->name == 'admin') {
//            return true;
//        }
        if(is_array($roles)){
            foreach($roles as $need_role){
                if($this->checkIfUserHasRole($need_role)) {
                    return true;
                }
            }
        } else{
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }
    private function getUserRole()
    {
        return $this->role()->getResults();
    }
    private function checkIfUserHasRole($need_role)
    {
        return (strtolower($need_role)==strtolower($this->have_role->name)) ? true : false;
    }

}
