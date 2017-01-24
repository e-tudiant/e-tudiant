<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('App.User.*', function ($user, $userId) {
            return (int) $user->id === (int) $userId;
        });

        /*
         * Authenticate the classroom's channel
         * @TODO : check if the user can acces the classroom
         */
      	Broadcast::channel('Classroom.*', function ($user, $classroomId) {
            return true;
        });

        /*
         * Authenticate the register channel
         * @TODO : check if the user can join the classroom
         */
        Broadcast::channel('Register.classroom.*', function ($user, $classroomId) {
            return ['userId' => $user->id, 'firstname' => $user->firstname, 'lastname' => $user->lastname ];
        });
    }
}
