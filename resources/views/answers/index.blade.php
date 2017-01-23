

<div class="col-sm-12">
<h4>Answers</h4>
{!! link_to_route('answer.create', 'Ajouter un answer', ['question_id' => $question->id]) !!}
@foreach ($answers as $answer)
<div>
    Réponse : {!! $answer->answer !!}
    {!! link_to_route('answer.show', 'Voir', [$answer->id]) !!}
    {!! link_to_route('answer.edit', 'Modifier', [$answer->id]) !!}
    {!! Form::open(['method' => 'DELETE', 'route' => ['answer.destroy', $answer->id]]) !!}
        {!! Form::submit('Supprimer') !!}
    {!! Form::close() !!}
</div>
@endforeach
</div>
