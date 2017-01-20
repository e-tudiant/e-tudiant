{!! Form::model($quizz, array('route' => ['quizz.update', $quizz->id], 'method' => 'PUT')) !!}
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