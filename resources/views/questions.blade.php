{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('quizz_id', 'Quizz_id:') !!}
			{!! Form::text('quizz_id') !!}
		</li>
		<li>
			{!! Form::label('question', 'Question:') !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}