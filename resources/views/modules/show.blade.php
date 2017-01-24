@extends('layouts.app')

@section('content')
@include('blocks.menuFormateur')

<div class="tab-content">
    <div id="profil" class="tab-pane fade in active">
            <h4>Quizz</h4>
            <div>Name : {!! $quizz->name !!}</div>
    </div>
</div>

@include('questions.index', ['questions' => $questions, 'quizz' => $quizz])
@endsection()

