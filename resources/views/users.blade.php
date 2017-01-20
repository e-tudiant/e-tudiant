{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('lastname', 'Lastname:') !!}
			{!! Form::text('lastname') !!}
		</li>
		<li>
			{!! Form::label('firstname', 'Firstname:') !!}
			{!! Form::text('firstname') !!}
		</li>
		<li>
			{!! Form::label('email', 'Email:') !!}
			{!! Form::text('email') !!}
		</li>
		<li>
			{!! Form::label('password', 'Password:') !!}
			{!! Form::text('password') !!}
		</li>
		<li>
			{!! Form::label('social_network', 'Social_network:') !!}
			{!! Form::text('social_network') !!}
		</li>
		<li>
			{!! Form::label('github', 'Github:') !!}
			{!! Form::text('github') !!}
		</li>
		<li>
			{!! Form::label('phone', 'Phone:') !!}
			{!! Form::text('phone') !!}
		</li>
		<li>
			{!! Form::label('avatar', 'Avatar:') !!}
			{!! Form::text('avatar') !!}
		</li>
		<li>
			{!! Form::label('phonebook', 'Phonebook:') !!}
			{!! Form::text('phonebook') !!}
		</li>
		<li>
			{!! Form::label('role_id', 'Role_id:') !!}
			{!! Form::text('role_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}