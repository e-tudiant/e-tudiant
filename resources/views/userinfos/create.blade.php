{!! Form::model($userinfo, array('files'=>true,'route' => [($userinfo->id ? 'userinfo.update' : 'userinfo.store'), $userinfo->id], 'method' => ($userinfo->id ? 'PUT' : 'POST'))) !!}
<ul>
    <li>
        {!! Form::label('social_network', 'Réseau social:') !!}
        {!! Form::text('social_network') !!}
    </li>
    <li>
        {!! Form::label('github_link', 'Github:') !!}
        {!! Form::text('github_link') !!}
    </li>
    <li>
        {!! Form::label('phone', 'Telephone:') !!}
        {!! Form::text('phone') !!}
    </li>
    <li>
        {!! Form::label('avatar', 'Avatar:') !!}
        {!! Form::file('avatar') !!}
    </li>
    <li>
        {!! Form::label('phonebook', 'Phonebook:') !!}
        {!! Form::text('phonebook') !!}
    </li>
    <li>
        {!! Form::submit() !!}
    </li>
</ul>
{!! Form::close() !!}
