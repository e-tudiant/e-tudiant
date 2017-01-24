@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="col-sm-12">
    <div id="profil" class="tab-pane fade in active">
            <h3>Classroom</h3>
            <div>Id : {!! $classroom->id !!}</div>
            <div>Name : {!! $classroom->name !!}</div>
            <div>Module : {!! $classroom->module->name !!}</div>
            <div>Statut : {!! $classroom->status ? 'En cours' : 'Terminé' !!}</div>
    </div>
</div>
@endsection()

