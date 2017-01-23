@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="col-sm-12">
    <div id="profil" class="tab-pane fade in active">
            <h3>Quizz</h3>
            <div>Id : {!! $quizz->id !!}</div>
            <div>Name : {!! $quizz->name !!}</div>
        <p>test</p>
    </div>
</div>

@include('questions.index', ['questions' => $questions, 'quizz' => $quizz])
@endsection()

