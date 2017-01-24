@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="tab col-sm-3 show-quizz">
    <div id="quizz" class="tab-pane fade in active">
        <div class="title">
            <h3>Quizz</h3>
        </div>
        <div class="tab-content">
            <div class="info-name">Id : {!! $quizz->id !!}</div>
            <div class="info-name">Name : {!! $quizz->name !!}</div>
        </div>
    </div>
</div>

@include('questions.index', ['questions' => $questions, 'quizz' => $quizz])
<div class="btn-create">
    {!! link_to_route('quizz.index', 'Retour à la liste') !!}
</div>
@endsection()

