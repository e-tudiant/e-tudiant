@extends('layouts.app')

@include('layouts.navbar')

@section('content')

<div class="tab group-edit-members">
    <div id="group" class="tab-pane fade in active">
        <div class="title">
            <h3>Membres du groupe</h3>
        </div>
        <div class="tab-content">
            <div class="group-name"><span>Nom du groupe :</span> {!! $group->name !!}</div>
            <div class="row">
                @include('groups.userlist', ['users' => $users, 'groups' => $group])
            </div>
        </div>
    </div>
</div>

@endsection()

<style>
    .group-edit-members .group-name{
        text-align: center;
        margin-bottom: 35px;
    }
    .group-edit-members span{
        font-family: Oswald;
        color: black;
        font-size: 15px;
    }
    .group-edit-members h4{
        color: black !important;
        font-size: 15px;
        padding-bottom: 30px;
    }
    .group-edit-members .members{
        text-align: center;
        border-right: 3px solid #efefef;
    }
    .group-edit-members .members-add{
        text-align: center;
    }
    .group-edit-members  .btn-create{
        width: 65%;
        font-size: 16px;
        font-family: Tinos;
        color: white;
        display: block;
        margin-bottom: 15px;
        margin-top: 5px;
    }
    .group-edit-members .btn-create:hover{
        color: black;
    }
</style>