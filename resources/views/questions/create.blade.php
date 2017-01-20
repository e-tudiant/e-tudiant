{!! Form::open(array('route' => 'question.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('question', 'Question:') !!}
			{!! Form::select('quizz', $quizzs) !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}