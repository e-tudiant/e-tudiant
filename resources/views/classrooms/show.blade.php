@extends('layouts.app')

@section('content')

@include('blocks.menuFormateur')

<div class="col-sm-12">
    <div id="profil" class="tab-pane fade in active">
            <h3>Classroom</h3>
            <div>Name : {!! $classroom->name !!}</div>
            @if (count($classroom->module) > 0)
                <div>Module : {!! $classroom->module->name !!}</div>
            @endif
            <div>Statut : {!! $classroom->status ? 'Terminé' : 'En cours'!!}</div>
    </div>
</div>
@endsection()

