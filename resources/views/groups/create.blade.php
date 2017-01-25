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

@include('layouts.navbar')

@section('content')
	<div class="tab group-edit">
		<div id="group" class="tab-pane fade in active">
			<div class="title">
				<h3>Groupe</h3>
			</div>
			<div class="tab-content">
				{!! Form::model($group, array('route' => $route, 'method' => $method)) !!}

					<div>
						{!! Form::label('name', 'Nom du groupe:') !!}
						{!! Form::text('name') !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="btn-create">
						{!! Form::submit() !!}
					</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>

@endsection()
