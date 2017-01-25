
@if(count($users)>0)
    <div class="col-sm-6 col-xs-12 members">
        <h4>Membres présents</h4>
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
    </div>
    <div class="col-sm-6 col-xs-12 members-add">
        <h4>Ajouter membres</h4>
    @else
    <div class="col-xs-12 members-add">
        <h4>Ajouter membres</h4>
@endif

{!! Form::open(['method' => 'PUT', 'route' => ['groupuser.addUserFromGroup', $group->id]]) !!}
{{--@foreach ($allUser as $RegistredUser)--}}

        <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
            <label for="role" class="col-md-4 control-label">Rôle</label>
            <div class="col-md-6">
                {{Form::select('ids[]', $allUser,null,['multiple'=>'multiple','class' => 'col-md-4 form-control'])}}
            </div>
        </div>



{{--@endforeach--}}

        <div class="btn-create">
{!! Form::submit('Ajouter ces utilisateurs') !!}
        </div>

{!! Form::close() !!}

    </div>
    </div>