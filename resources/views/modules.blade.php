{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('name', 'Name:') !!}
			{!! Form::text('name') !!}
		</li>
		<li>
			{!! Form::label('image_url', 'Image_url:') !!}
			{!! Form::text('image_url') !!}
		</li>
		<li>
			{!! Form::label('slider_url', 'Slider_url:') !!}
			{!! Form::text('slider_url') !!}
		</li>
		<li>
			{!! Form::label('slider_token', 'Slider_token:') !!}
			{!! Form::text('slider_token') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}