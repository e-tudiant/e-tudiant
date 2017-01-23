<?php
if ($question->id) {
    $route = ['question/' . $question->id];
    $method = 'PUT';
} else {
    $route = ['question?quizz_id=' . $quizz_id];
    $method = 'POST';
}
?>
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')


<div class="col-sm-12">
	<h4>Quizz</h4>
	{!! Form::model($question, array('url' => $route, 'method' => $method)) !!}
		<ul>
			<li>
				{!! Form::label('question', 'Question : ') !!}
				{!! Form::textarea('question') !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</li>
			<li>
				{!! Form::submit() !!}
			</li>
		</ul>
	{!! Form::close() !!}
</div>


@endsection()