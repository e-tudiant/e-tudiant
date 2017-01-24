@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="tab col-sm-3 show-question">
    <div id="quizz" class="tab-pane fade in active">
        <div class="title">
            <h3>Question</h3>
        </div>
        <div class="tab-content">
            <div class="info-name">Quizz : {!! $question->quizz->name !!}</div>
            <div class="info-name">Question : {!! $question->question !!}</div>
        </div>
        </div>
    </div>

    @include('answers.index', ['answers' => $answers, '$question' => $question])
<div class="btn-create">
    {!! link_to_route('quizz.show', 'Retour au quizz ', [$question->quizz_id]) !!}
</div>
@endsection()

