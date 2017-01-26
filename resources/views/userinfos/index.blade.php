@extends('layouts.app')

@include('layouts.navbar')

@section('content')


    <div class="tab profil-index">
        <div id="profil" class="tab-pane fade in active">
            <div class="title">
                <h3>Mon profil</h3>
            </div>
            <div class="tab-content">
            <div class="row">
                <div class="col-sm-6">
                    <div><span class="info-name">Prénom</span>{!! $user->firstname !!}</div>
                    <div><span class="info-name">Nom</span>{!! $user->lastname !!}</div>
                    <div><span class="info-name">E-mail</span>{!! $user->email !!}</div>
                    <div><span class="info-name">Rôle</span>{!! $user->role->description !!}</div>

                @if(count($userinfo)==0)
                </div>
                <div class="btn-create">
                    {!!link_to_route('userinfo.create','Ajouter informations') !!}
                </div>

                @elseif(count($userinfo)>0)
                    <div><span class="info-name">Git-Hub</span>{!! $userinfo->github_link !!}</div>
                    <div><span class="info-name">Réseaux sociaux</span>{!! $userinfo->social_network !!}</div>
                    <div><span class="info-name">Tél</span>{!! $userinfo->phone !!}</div>
                    <div>
                        @if($userinfo->phonebook)
                            <small class="right info-name"><i class="fa fa-check" aria-hidden="true"></i>Profil public</small>
                        @else
                            <small class="wrong info-name"><i class="fa fa-check" aria-hidden="true"></i>Profil privé</small>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div>
                        <span class="info-name">Avatar</span>
                        <div class="avatar">
                            <img src="{!!'/uploads/images/users/'.($userinfo->avatar)!!}" alt="avatar utilisateur" width="200">
                        </div>
                    </div>
                </div>
            </div>
                    <div class="btn-create">
                        {!!link_to_route('userinfo.edit','Modifier informations',$userinfo->id) !!}
                    </div>
            </div>
            @endif
        </div>
    </div>

@endsection()

@section('scriptpage')
    <script src="/js/profil.js"></script>
@endsection