{{--{{dd($allUser)}}--}}
@if(count($users)>0)
    @foreach ($users as $user)
        <div>
            {{$user->lastname}}
            {{$user->firstname}}
            {!! Form::open(['method' => 'DELETE', 'route' => ['groupuser.deleteUserFromGroup', $group->id, $user->id]]) !!}
            {!! Form::submit('Enlever cet utilisateur') !!}
            {!! Form::close() !!}

            {{--{!! link_to_route('question.show', 'Voir', [$question->id]) !!}--}}
            {{--{!! link_to_route('question.edit', 'Modifier', [$question->id, $quizz->id]) !!}--}}
            {{--{!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}--}}
            {{--{!! Form::submit('Supprimer') !!}--}}
            {{--{!! Form::close() !!}--}}
        </div>
    @endforeach
@endif
{!! Form::open(['method' => 'PUT', 'route' => ['groupuser.addUserFromGroup', $group->id]]) !!}
{{--@foreach ($allUser as $RegistredUser)--}}
    {{Form::select('ids[]', $allUser,null, ['multiple' => true])}}
{{--@endforeach--}}
{!! Form::submit('Ajouter ces utilisateurs') !!}
{!! Form::close() !!}