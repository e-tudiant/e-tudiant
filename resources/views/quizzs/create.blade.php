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

<div class="col-sm-12">
	<div id="quizz" class="tab-pane fade in active">

		<h3>Quizz</h3>
		{!! Form::model($quizz, array('route' => [($quizz->id ? 'quizz.update' : 'quizz.store'), $quizz->id], 'method' => ($quizz->id ? 'PUT' : 'POST'))) !!}
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

@endsection()
