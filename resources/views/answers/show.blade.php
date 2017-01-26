@extends('layouts.app')

@include('layouts.navbar')

@section('content')

    <div class="tab col-sm-6 show-answer">
        <div id="quizz" class="tab-pane fade in active">
            <div class="title">
                <h3>Réponse</h3>
            </div>
            <div class="tab-content">
                <div class="info-name">Réponse : {!! $answer->answer !!}</div>
                <div class="info-name">Correct : {!! $answer->correct ? 'Vrai' : 'Faux' !!}</div>
            </div>
        </div>
        <div class="btn-create">
            {!! link_to_route('question.show', 'Retour à la question', [$answer->question_id]) !!}
        </div>
    </div>
    <div class="col-sm-6 img"><img src="/img/code.jpg"></div>

@endsection()

<style>
    .img img{
        width: 100%;
        height: auto;
    }

    .show-answer .btn-create{
        width: 55%;
    }
</style>