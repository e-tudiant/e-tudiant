@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab users-list">
        <div id="users" class="tab-pane fade in active">
            <div class="title">
                <h3>Modules</h3>
            </div>
            <div class="tab-content">
    @foreach($users as $user)
        {{--{{dd($user->canJoinClassroom(1))}}--}}
        <div class="col-md-3">
            {{$user->lastname}}<br>
            {{$user->firstname}}<br>
            {{$user->role->name}}
            @if($user->user_info!=NULL)
                <div>
                    <img src="/uploads/images/users/{{$user->user_info->avatar}}" alt="avatar" width="100">
                </div>
            @endif
            {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
            <div class="btn-delete col-sm-1 col-xs-12">{!! Form::submit('') !!}</div>
            {!! Form::close() !!}
        </div>
    @endforeach
</div>
