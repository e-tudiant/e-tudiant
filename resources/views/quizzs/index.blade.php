@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="tab-content">
    <div id="profil" class="tab-pane fade in active">

            <h4>Quizz</h4>
            {!! link_to_route('quizz.create', 'Ajouter un quizz') !!}
            @foreach ($quizzs as $quizz)
                <div>
                    Name : {!! $quizz->name !!}
                    {!! link_to_route('quizz.show', 'Voir', [$quizz->id]) !!}
                    {!! link_to_route('quizz.create', 'Modifier', [$quizz->id]) !!}
                    {!! Form::open(['method' => 'DELETE', 'route' => ['quizz.destroy', $quizz->id]]) !!}
                    {!! Form::submit('Supprimer') !!}
                    {!! Form::close() !!}
                </div>
            @endforeach

    </div>
</div>

@endsection()