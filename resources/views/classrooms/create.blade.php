<?php
if ($classroom->id) {
    $route = ['classroom.update', $classroom->id];
    $method = 'PUT';
    $groupsDefault = $classroom->group->pluck('id')->toArray();
    $modulesDefault=$classroom->module->pluck('id')->toArray();
    $quizzsDefault=$classroom->quizz->pluck('id')->toArray();
} else {
    $route = 'classroom.store';
    $method = 'POST';
    $groupsDefault = null;
    $modulesDefault=null;
    $quizzsDefault=null;
}
?>
@extends('layouts.app')
@include('layouts.navbar')

@section('content')

<div class="tab class-create">
	<div id="module" class="tab-pane fade in active">
		<div class="title">
			<h3>Créer ma classe</h3>
		</div>
		<div class="tab-content">
		{!! Form::model($classroom, array('route' => $route, 'method' => $method)) !!}

			<div class="form-group">
				{!! Form::label('name', 'Nom :') !!}
				{!! Form::text('name') !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				{!! Form::label('module_id', 'Module :') !!}
				<div>
					{!! Form::select('module_id[]', $modules, $modulesDefault, ['multiple'=>'multiple','class' => 'form-control']) !!}
				</div>
				{!! $errors->first('module_id', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				{!! Form::label('group_id', 'Groupes :') !!}
				<div>
					{{Form::select('group_id[]', $groups, $groupsDefault, ['multiple'=>'multiple','class' => 'form-control'])}}
				</div>
				{!! $errors->first('group_id', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="form-group">
				{!! Form::label('quizz_id', 'Quizz :') !!}
				<div>
					{{Form::select('quizz_id[]', $quizzs, $quizzsDefault, ['multiple'=>'multiple','class' => 'form-control'])}}
				</div>
				{!! $errors->first('quizz_id', '<small class="help-block">:message</small>') !!}
			</div>
			<div>
				{!! Form::label('status', 'Terminé :') !!}
				{!! Form::checkbox('status') !!}
				{!! $errors->first('status', '<small class="help-block">:message</small>') !!}
			</div>
			<div class="btn-create">
				{!! Form::submit() !!}
			</div>
			<div class="btn-create">
				{!! link_to_route('classroom.index', 'Annuler') !!}
			</div>


			{!! Form::close() !!}
		</div>
	</div>
</div>

	<style>

	</style>

@endsection()
