@extends('layouts.app')
@section('content')
    {{--{{dd($userinfo)}}--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {!! $user->firstname !!}<br>
                {!! $user->lastname !!}<br>
                {!! $user->email !!}<br>
                {!! $user->role->description !!}<br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @if(count($userinfo)==0)
                    {!!link_to_route('userinfo.create','AJOUTER INFOS SUPPLEMENTAIRES') !!}<br>
            </div>
            {{--@endif--}}
            @elseif(count($userinfo)>0)
                <h5>Informations complémentaires</h5>
                <span>GibHub:</span>{!! $userinfo->github_link !!}<br>
                <span>Réseau social:</span>{!! $userinfo->social_network !!}<br>
                <span>Téléphone:</span>{!! $userinfo->phone !!}<br>
                <span>Avatar :</span><img src="{!!'/uploads/images/users/'.($userinfo->avatar)!!}" alt="avatar utilisateur" width="200"><br>


                {!!link_to_route('userinfo.edit','EDITER INFOS SUPPLEMENTAIRES',$userinfo->id) !!}
        </div>
        @endif


    </div>
@endsection
