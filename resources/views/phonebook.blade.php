@extends('layouts.app')
@if(count($userList)>0)

    @foreach($userList as $user)
        {{ $user->firstname }}
        {{ $user->lastname }}<br>
        {{ $user->email }}<br>
        @if($user->User_info->social_network)
            {{$user->User_info->social_network}}<br>
        @endif
        @if($user->User_info->social_network)
            {{$user->User_info->social_network}}<br>
        @endif
        @if($user->User_info->github)
            {{$user->User_info->github}}<br>
        @endif
        @if($user->User_info->phone)
            {{$user->User_info->phone}}<br>
        @endif
        @if($user->User_info->avatar)
            <img src="uploads/images/users/{{$user->User_info->avatar}}" alt="user_avatar" width="100"/><br>
        @else
            <img src="assets/img/portrait par défaut.jpg" alt="user_avatar" width="100"/><br>
        @endif
    @endforeach
@endif
