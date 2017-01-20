<h1>Quizzs</h1>
{!! link_to_route('quizz.create', 'Ajouter un quizz') !!}
@foreach ($quizzs as $quizz)
    <div>
        Name : {!! $quizz->name !!}
        {!! link_to_route('quizz.show', 'Voir', [$quizz->id]) !!}
        {!! link_to_route('quizz.edit', 'Modifier', [$quizz->id]) !!}
        {!! Form::open(['method' => 'DELETE', 'route' => ['quizz.destroy', $quizz->id]]) !!}
            {!! Form::submit('Supprimer') !!}
        {!! Form::close() !!}
    </div>
@endforeach
