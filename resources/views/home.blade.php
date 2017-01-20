@extends('layouts.app')

@section('content')


    <div class="panel-body">
        Bienvenue à toi "nom du user connecté"
    </div>

    @if(Auth::user()->role_id == 3)
        @include('blocks.menuApprenant')
    @elseif(Auth::user()->role_id == 2)
        @include('blocks.menuFormateur')
    @else
        <p>admin pas encore fait, <a href="/login">retour loggin</a></p>
    @endif

@endsection
