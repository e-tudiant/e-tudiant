<h1>Answers</h1>
{!! link_to_route('answer.create', 'Ajouter un answer') !!}
@foreach ($answers as $answer)
    <div>
        Name : {!! $answer->name !!}
        {!! link_to_route('answer.show', 'Voir', [$answer->id]) !!}
        {!! link_to_route('answer.edit', 'Modifier', [$answer->id]) !!}
        {!! Form::open(['method' => 'DELETE', 'route' => ['answer.destroy', $answer->id]]) !!}
            {!! Form::submit('Supprimer') !!}
        {!! Form::close() !!}
    </div>
@endforeach
