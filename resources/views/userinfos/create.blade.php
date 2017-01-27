@extends('layouts.app')

@include('layouts.navbar')

@section('content')


    <div class="tab userinfo-create">
        <div id="profil" class="tab-pane fade in active">
            <div class="title">
                <h3>Mon Profil</h3>
            </div>
            <div class="tab-content">
                {!! Form::model($userinfo, array('files'=>true,'route' => [($userinfo->id ? 'userinfo.update' : 'userinfo.store'), $userinfo->id], 'method' => ($userinfo->id ? 'PUT' : 'POST'))) !!}
                <div>
                    {!! Form::label('social_network', 'Réseau social:') !!}
                    {!! Form::text('social_network') !!}
                </div>
                <div>
                    {!! Form::label('github_link', 'Github:') !!}
                    {!! Form::text('github_link') !!}
                </div>
                <div>
                    {!! Form::label('phone', 'Telephone:') !!}
                    {!! Form::text('phone') !!}
                </div>
                <div>
                    {!! Form::label('avatar', 'Avatar:') !!}
                    {!! Form::file('avatar') !!}
                </div>
                <div>
                    {!! Form::label('phonebook', 'Profil:') !!}
                    Privé {!! Form::radio('phonebook', '0', true) !!}<br>
                    Public {!! Form::radio('phonebook', '1') !!}
                </div>
                <div class="btn-create">
                    {!! Form::submit('Sauvegarder') !!}
                </div>
                <div class="btn-create">
                    {!! link_to_route('userinfo.index', 'Annuler') !!}
                </div>

                {!! Form::close() !!}


            </div>
        </div>
    </div>

@endsection()
