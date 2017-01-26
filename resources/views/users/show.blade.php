@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab users-list">
        <div id="users" class="tab-pane fade in active">
            <div class="title">
                <h3>Utilisateurs</h3>
            </div>
            <div class="tab-content">
                <div class="row">
                    @foreach($users as $user)

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="tab users-list">
                                <div class="tab-pane fade in active">
                                    <div class="title">
                                        <h4>{{$user->firstname}} {{$user->lastname}}</h4>
                                    </div>
                                    <div class="tab-content">
                                        <div class="info-name role">
                                            {{$user->role->name}}
                                            @if($user->role->name == 'admin')
                                                <br><small><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Attention admin</small>
                                            @else
                                                <br><small style="opacity: 0">test</small>
                                            @endif
                                        </div>

                                        @if(!is_null($user->user_info) && !empty($user->user_info->avatar))
                                            <div class="avatar">
                                                <img src="/uploads/images/users/{{$user->user_info->avatar}}"
                                                     alt="avatar" width="100%">
                                            </div>
                                        @else
                                            <div class="avatar">
                                                <img src="/img/avatar-generik.png"
                                                     alt="avatar" width="100%">
                                            </div>
                                        @endif
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                                        <div class="btn-create">{!! Form::submit('Supprimer') !!}</div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach

    @foreach($users as $user)
        {{dd($user->joinableClassroom())}}
        <div class="col-md-3">
            {{$user->lastname}}<br>
            {{$user->firstname}}<br>
            {{$user->role->name}}
            @if($user->user_info!=NULL)
                <div>
                    <img src="/uploads/images/users/{{$user->user_info->avatar}}" alt="avatar" width="100">
                </div>
            </div>
        </div>
    </div>

@endsection()
