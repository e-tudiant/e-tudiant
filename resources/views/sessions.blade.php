{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('classroom_id', 'Classroom_id:') !!}
			{!! Form::text('classroom_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('answer_id', 'Answer_id:') !!}
			{!! Form::text('answer_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}