<?php
if ($quizz->id) {
    $route = ['quizz.update', $quizz->id];
    $method = 'PUT';
    $classroomsDefault = $quizz->classroom->pluck('id')->toArray();
} else {
    $route = 'quizz.store';
    $method = 'POST';
    $classroomsDefault = null;

}
?>
@extends('layouts.app')

@include('layouts.navbar')

@section('content')

<div class="tab quizz-create">
	<div id="quizz" class="tab-pane fade in active ">
		<div class="title">
			<h3>Quizz</h3>
		</div>
		<div class="tab-content">
		{!! Form::model($quizz, array('route' => $route, 'method' => $method)) !!}
			<div>
				{!! Form::label('name', 'Nom du quiz :') !!}
				{!! Form::text('name') !!}
				{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
			</div>
			<div>
				{!! Form::label('classroom_id', 'Classe :') !!}
				<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
					<div>
						{{Form::select('classroom_id[]', $classrooms, $classroomsDefault, ['multiple'=>'multiple','class' => 'form-control'])}}
						{{--{{Form::select('ids[]', $allUser,null,['multiple'=>'multiple','class' => 'form-control'])}}--}}
					</div>
				</div>
				{!! $errors->first('classroom_id', '<small class="help-block">:message</small>') !!}
			</div>
            <div class="btn-create">
                {!! Form::submit('Sauvegarder') !!}
            </div>
            <div class="btn-create">
                {!! link_to_route('quizz.index', 'Annuler') !!}
            </div>

		{!! Form::close() !!}
		</div>
	</div>
</div>

@endsection()
