@extends('layouts.app')

@section('content')

    <h2>Titre possible</h2>
    <p>Bienvenue dans votre interface d'apprenant , venez ici gerer pas mal de truc</p>

    <ul class="nav nav-tabs">
        <li><a href="/home#accueil">Accueil</a></li>
        <li><a href="#profil">Profil</a></li>
        <li><a href="#library">Librairie</a></li>
        <li><a href="#course">Mes cours</a></li>
        <li class="active"><a href="/quizz/#profil">Mes Quizz</a></li>
        <li><a href="#class">Salle de classe</a></li>
    </ul>

    <div class="tab-content">
        <div id="profil" class="tab-pane fade in active">
            <h3>Profil</h3>
            <p>Mettre les infos du profil apprenant, avec formulaire pour modifier infos !</p>
            <ul>
                <li>Avatar</li>
                <li>Ajout infos : stack, git, autres</li>
            </ul>

            <div class="col-sm-8 col-xs-12">

                <h4>Quizz</h4>
                <div>Id : {!! $quizz->id !!}</div>
                <div>Name : {!! $quizz->name !!}</div>
            </div>
        </div>
    </div>

@endsection()

@include('questions.index', ['questions' => $questions, 'quizz' => $quizz])
