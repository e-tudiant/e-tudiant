{!! Form::model(array('route' => [($question->id ? 'question.update' : 'question.store'), $quizz_id], 'method' => ($question->id ? 'PUT' : 'POST'))) !!}
	<ul>
		<li>
			{!! Form::label('question', 'Question : ') !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}