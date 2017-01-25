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

@include('layouts.navbar')

@section('content')


<div class="tab question-create">
	<div id="question" class="tab-pane fade in active">
		<div class="title">
	<h4>Question</h4>
		</div>
		<div class="tab-content">
	{!! Form::model($question, array('url' => $route, 'method' => $method)) !!}
			<div>
				{!! Form::label('question', 'Question : ') !!}
				{!! Form::textarea('question') !!}
				{!! $errors->first('question', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="btn-create">
				{!! Form::submit('Sauvegarder') !!}
			</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection()
