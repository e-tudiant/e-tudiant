@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')


<div class="col-sm-12">
    <h4>Answers</h4>
    <div>Id : {!! $answer->id !!}</div>
    <div>Réponse : {!! $answer->answer !!}</div>
    <div>Correct : {!! $answer->correct ? 'Vrai' : 'Faux' !!}</div>
</div>
<div class="col-sm-12">
    {!! link_to_route('question.show', 'Voir', [$answer->question_id]) !!}
</div>
@endsection()

