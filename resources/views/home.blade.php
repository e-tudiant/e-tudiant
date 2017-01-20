@extends('layouts.app')

@section('content')


    <div class="panel-body">
        Bienvenue à toi "nom du user connecté"
    </div>

    {{--@include('blocks.menuApprenant')--}}

    @include('blocks.menuFormateur')

@endsection
