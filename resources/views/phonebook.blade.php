@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    @if(count($userList)>0)
        @foreach($userList as $user)

<div class="col-sm-6 col-xs-12">
            <div class="tab profil-index">
                <div id="phonebook" class="tab-pane fade in active">
                    <div class="title">
                        <h3>{{ $user->firstname }} {{ $user->lastname }}</h3>
                    </div>
                    <div class="tab-content">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                {{--<div><span class="info-name">Groupe</span>{{ $user->getUserGroups() }}</div>--}}
                                <div><span class="info-name">E-mail</span>{{ $user->email }}</div>
                                @if($user->User_info->social_network)
                                    <div>
                                        <span class="info-name">Réseau social</span>{{$user->User_info->social_network}}
                                    </div>
                                @endif
                                @if($user->User_info->github_link)
                                    <div><span class="info-name">GitHub</span>{{$user->User_info->github_link}}</div>
                                @endif
                                @if($user->User_info->phone)
                                    <div><span class="info-name">Tel</span>{{$user->User_info->phone}}</div>
                                @endif
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div>
                                    <span class="info-name">Avatar</span>
                                    <div class="avatar">
                                        @if($user->User_info->avatar)
                                            <img src="uploads/images/users/{{$user->User_info->avatar}}"
                                                 alt="user_avatar" width="100"/><br>
                                        @else
                                            <img src="/img/avatar-generik.png" alt="user_avatar" width="100"/>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
        @endforeach

    @endif

@endsection