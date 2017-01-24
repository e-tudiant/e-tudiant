@extends('layouts.app')

@include('layouts.navbar')

@section('content')

<div class="tab-content">
    <div id="profil" class="tab-pane fade in active">
            <h4>Quizz</h4>
            <div>Name : {!! $quizz->name !!}</div>
    </div>
</div>

@include('questions.index', ['questions' => $questions, 'quizz' => $quizz])
@endsection()

