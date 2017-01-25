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

</style>