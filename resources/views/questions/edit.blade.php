{!! Form::model($question, array('route' => ['question.update', $question->id], 'method' => 'PUT')) !!}
<ul>
    <li>
        {!! Form::label('question', 'Question:') !!}
        {!! Form::textarea('question', null) !!}
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}