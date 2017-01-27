<?php
if ($answer->id) {
    $route = ['answer/' . $answer->id];
    $method = 'PUT';
    $back = '/question/' . $answer->question_id;
} else {
    $route = ['answer?question_id=' . $question_id];
    $method = 'POST';
    $back = '/question/' . $question_id;
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
                <div class="btn-create">
                    {!! link_to($back, 'Annuler') !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection()
