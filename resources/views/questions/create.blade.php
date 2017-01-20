{!! Form::open(array('route' => 'question.store', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('quizz', 'Quizz : ') !!}
			{!! Form::select('quizz', $quizzs) !!}
			{!! Form::label('question', 'Question : ') !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}