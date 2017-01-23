<?php
if ($quizz->id) {
    $route = ['quizz.update', $quizz->id];
    $method = 'PUT';
} else {
    $route = 'quizz.store';
    $method = 'POST';
}
?>
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="tab">
	<div id="quizz" class="tab-pane fade in active quizz-create">
		<div class="title">
			<h3>Quizz</h3>
		</div>
		<div class="tab-content">
		{!! Form::model($quizz, array('route' => [($quizz->id ? 'quizz.update' : 'quizz.store'), $quizz->id], 'method' => ($quizz->id ? 'PUT' : 'POST'))) !!}

			<div>
				{!! Form::label('name', 'Nom du quiz :') !!}
				{!! Form::text('name') !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="btn-create">
				{!! Form::submit('Créer') !!}
			</div>

		{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection()

<style>


</style>