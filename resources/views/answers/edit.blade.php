{!! Form::model($answer, array('route' => ['answer.update', $answer->id], 'method' => 'PUT')) !!}
<ul>
    <li>
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name') !!}
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}
