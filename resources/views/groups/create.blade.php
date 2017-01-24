<?php
if ($group->id) {
    $route = ['group.update', $group->id];
    $method = 'PUT';
} else {
    $route = 'group.store';
    $method = 'POST';
}
?>
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

				<h4>Groupe</h4>
				{!! Form::model($group, array('route' => $route, 'method' => $method)) !!}
				<ul>
					<li>
						{!! Form::label('name', 'Name:') !!}
						{!! Form::text('name') !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</li>
					<li>
						{!! Form::submit() !!}
					</li>
				</ul>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection()
