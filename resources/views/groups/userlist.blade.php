
@if(count($users)>0)
    <div class="col-sm-6 col-xs-12 members">
        <h4>Membres présents</h4>
    @foreach ($users as $user)
        <div>
        <div class="member-info">
            {{$user->lastname}}
            {{$user->firstname}}
        </div>
            {!! Form::open(['method' => 'DELETE', 'route' => ['groupuser.deleteUserFromGroup', $group->id, $user->id]]) !!}
            <div class="btn-delete">{!! Form::submit('Enlever cet utilisateur') !!}</div>
            {!! Form::close() !!}
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
            <div>
                {{Form::select('ids[]', $allUser,null,['multiple'=>'multiple','class' => 'form-control'])}}
            </div>
        </div>



{{--@endforeach--}}

        <div class="btn-create">
{!! Form::submit('Ajouter ces utilisateurs') !!}
        </div>

{!! Form::close() !!}

    </div>
    </div>