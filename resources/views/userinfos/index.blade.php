@extends('layouts.app')

@section('content')

    @include('blocks.menuFormateur')

    <div class="tab profil-index">
        <div id="profil" class="tab-pane fade in active">
            <div class="title">
                <h3>Mon profil</h3>
            </div>
            <div class="tab-content">

                {!! $user->firstname !!}<br>
                {!! $user->lastname !!}<br>
                {!! $user->email !!}<br>
                {!! $user->role->description !!}<br>

                @if(count($userinfo)==0)
                    <div class="btn-create">
                    {!!link_to_route('userinfo.create','Ajouter informations') !!}<br>
                    </div>

                    {{--@endif--}}
                @elseif(count($userinfo)>0)
                    <h5>Informations complémentaires</h5>
                    <span>GibHub:</span>{!! $userinfo->github_link !!}<br>
                    <span>Réseau social:</span>{!! $userinfo->social_network !!}<br>
                    <span>Téléphone:</span>{!! $userinfo->phone !!}<br>
                    <span>Avatar :</span><img src="{!!'/uploads/images/users/'.($userinfo->avatar)!!}"
                                              alt="avatar utilisateur" width="200"><br>


                    <div class="btn-create">
                    {!!link_to_route('userinfo.edit','EDITER INFOS SUPPLEMENTAIRES',$userinfo->id) !!}
                    </div>
                </div>
            @endif
        </div>
    </div>



@endsection()