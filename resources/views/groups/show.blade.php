@extends('layouts.app')

@section('content')

            <div class="col-sm-8 col-xs-12">
                <h4>Group</h4>
                <div>Id : {!! $group->id !!}</div>
                <div>Name : {!! $group->name !!}</div>
            </div>
        </div>
    </div>
@include('groups.userlist', ['users' => $users, 'groups' => $group])
@endsection()


