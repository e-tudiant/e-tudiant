<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_info extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','social_network','github_link', 'phone','avatar','phonebook'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**/
    public function User(){
        return $this->belongsTo('App\User');

    }



}
