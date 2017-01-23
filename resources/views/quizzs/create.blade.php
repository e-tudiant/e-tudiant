@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

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
			{!! Form::model($quizz, array('route' => [($quizz->id ? 'quizz.update' : 'quizz.store'), $quizz->id], 'method' => ($quizz->id ? 'PUT' : 'POST'))) !!}
			<ul>
				<li>
					{!! Form::label('name', 'Name:') !!}
					{!! Form::text('name') !!}
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
