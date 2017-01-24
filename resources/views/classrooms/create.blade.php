<?php
if ($classroom->id) {
    $route = ['classroom.update', $classroom->id];
    $method = 'PUT';
} else {
    $route = 'classroom.store';
    $method = 'POST';
}
?>
@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="col-sm-12">
	<div id="classroom" class="tab-pane fade in active">

		<h3>Classroom</h3>
		{!! Form::model($classroom, array('route' => $route, 'method' => $method)) !!}
		<ul>
			<li>
				{!! Form::label('name', 'Nom :') !!}
				{!! Form::text('name') !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</li>
			<li>
				{!! Form::label('module_id', 'Module :') !!}
				{!! Form::select('module_id', $modules) !!}
				{!! $errors->first('module_id', '<small class="help-block">:message</small>') !!}
			</li>
			<li>
				{!! Form::label('status', 'En cours :') !!}
				{!! Form::checkbox('status') !!}
				{!! $errors->first('status', '<small class="help-block">:message</small>') !!}
			</li>
			<li>
				{!! Form::label('group_id', 'Groupes :') !!}
				{{Form::select('group_id[]', $groups, $classroom->group->pluck('id')->toArray(), ['multiple' => true])}}
				{!! $errors->first('groups', '<small class="help-block">:message</small>') !!}
			</li>
			<li>
				{!! Form::submit() !!}
			</li>
		</ul>
		{!! Form::close() !!}

</div>

@endsection()
