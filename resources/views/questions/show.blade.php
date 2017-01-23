@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

    <div class="col-sm-12">
        <h4>Questions</h4>
        <div>Id : {!! $question->id !!}</div>
        <div>Quizz : {!! $question->quizz->name !!}</div>
        <div>Question : {!! $question->question !!}</div>
    </div>

@include('answers.index', ['answers' => $answers, '$question' => $question])
<div class="col-sm-12">
    {!! link_to_route('quizz.show', 'Retour au quizz ', [$question->quizz_id]) !!}
</div>
@endsection()

