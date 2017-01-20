{!! Form::open(array('route' => 'question.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('quizz_id', 'Quizz : ') !!}
			{!! Form::select('quizz_id', $quizzs) !!}
		</li>
		<li>
			{!! Form::label('question', 'Question : ') !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}