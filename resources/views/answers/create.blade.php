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

@include('layouts.navbar')

@section('content')

    <div class="tab answer-create">
        <div id="question" class="tab-pane fade in active">
            <div class="title">
                <h4>Réponse</h4>
            </div>
            <div class="tab-content">
                {!! Form::model($answer, array('url' => $route, 'method' => $method)) !!}

                    <div>
                        {!! Form::label('answer', 'Réponse:') !!}
                        {!! Form::textarea('answer') !!}
                        {!! $errors->first('answer', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div>
                        {!! Form::label('correct', 'Correct:') !!}
                        {!! Form::checkbox('correct') !!}
                        {!! $errors->first('correct', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="btn-create">
                        {!! Form::submit() !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()
