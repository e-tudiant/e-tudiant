{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('classroom_id', 'Classroom_id:') !!}
			{!! Form::text('classroom_id') !!}
		</li>
		<li>
			{!! Form::label('quizz_id', 'Quizz_id:') !!}
			{!! Form::text('quizz_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}