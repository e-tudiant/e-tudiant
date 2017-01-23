
<div class="col-sm-12">
    <h4>Questions</h4>
    {!! link_to_route('question.create', 'Ajouter un question', ['quizz_id' => $quizz->id]) !!}
    @foreach ($questions as $question)
        <div>
            Question : {!! $question->question !!}
            {!! link_to_route('question.show', 'Voir', [$question->id]) !!}
            {!! link_to_route('question.edit', 'Modifier', [$question->id]) !!}
            {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
                {!! Form::submit('Supprimer') !!}
            {!! Form::close() !!}
        </div>
    @endforeach
</div>
