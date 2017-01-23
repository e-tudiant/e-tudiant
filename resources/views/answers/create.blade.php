<?php
if ($answer->id) {
    $route = ['answer/' . $answer->id];
    $method = 'PUT';
} else {
    $route = ['answer?question_id=' . $question_id];
    $method = 'POST';
}
?>
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="col-sm-12">
	<h4>Réponses</h4>
	{!! Form::model($answer, array('url' => $route, 'method' => $method)) !!}
	<ul>
		<li>
			{!! Form::label('answer', 'Réponse:') !!}
			{!! Form::textarea('answer') !!}
			{!! $errors->first('answer', '<small class="help-block">:message</small>') !!}
		</li>
		<li>
			{!! Form::label('correct', 'Correct:') !!}
			{!! Form::checkbox('correct') !!}
			{!! $errors->first('correct', '<small class="help-block">:message</small>') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
	{!! Form::close() !!}
</div>

@endsection()